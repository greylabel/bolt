<?php

namespace Acquia\Blt\Robo\Tasks;

use Robo\Task\Testing\PHPUnit;

/**
 * Runs PHPUnit tests.
 */
class PhpUnitTask extends PHPUnit {

  /**
   * @var boolean
   */
  protected $sudo;

  /**
   * @var string
   */
  protected $user;

  /**
   * @return $this
   */
  public function sudo(bool $sudo = TRUE) {
    $this->sudo = $sudo;
    return $this;
  }

  /**
   * @return $this
   */
  public function user($user) {
    $this->user = is_string($user) ? $user : NULL;
    return $this;
  }

  /**
   * @param string $printer
   *
   * @return $this
   */
  public function printer($printer) {
    $this->option('printer', $printer);
    return $this;
  }

  /**
   * @return $this
   */
  public function stopOnError() {
    $this->option("stop-on-error");
    return $this;
  }

  /**
   * @return $this
   */
  public function stopOnFailure() {
    $this->option("stop-on-failure");
    return $this;
  }

  /**
   * @return $this
   */
  public function testdox() {
    $this->option("testdox");
    return $this;
  }

  /**
   * @param string $testsuites
   *
   * @return $this
   */
  public function testsuite($testsuites) {
    $this->option('testsuite', $testsuites, ' ');
    return $this;
  }

  /**
   * @return $this
   */
  public function verbose() {
    $this->option("verbose");
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getCommand() {
    $command = $this->command . $this->arguments . $this->files;
    $user = isset($this->user) ? "-u $this->user " : "";
    return $this->sudo ? "sudo $user" . $command : $command;
  }

}
