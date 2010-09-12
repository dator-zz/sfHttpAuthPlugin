<?php
 /**
 * HTTP Authentication filter for Symfony
 *
 * @author James McGlinn <james@mcglinn.org>
 * @version 1
 */
class httpAuthFilter extends sfFilter
{
  /**
   * Execute filter
   *
   * @param sfFilterChain $filterChain
   */
  public function execute ($filterChain)
  {
    // execute filter once
    if ($this->isFirstCall()) {
      if (!isset($_SERVER['PHP_AUTH_USER'])) {
        $this->sendHeadersAndExit();
      }
      if (!($_SERVER['PHP_AUTH_USER'] == sfConfig::get('app_auth_username') && $_SERVER['PHP_AUTH_PW'] == sfConfig::get('app_auth_password'))) {
        $this->sendHeadersAndExit();
      }
    }
    // execute next filter
    $filterChain->execute();
  }
 
  /**
   * Sends HTTP Auth headers and exits
   *
   * @return null
   */
  private function sendHeadersAndExit()
  {
    header('WWW-Authenticate: Basic realm="' . sfConfig::get('app_auth_realm') . '"');
    header('HTTP/1.0 401 Unauthorized');
    exit;
  }
}