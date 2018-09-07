<?php

namespace Drupal\Tests\tdd_blog\Functional;

use Drupal\Tests\BrowserTestBase;

class PageListTest extends BrowserTestBase {

  protected static $modules = ['tdd_blog'];

  public function testBlogPageExists() {
    $this->drupalGet('blog');

    $this->assertSession()->statusCodeEquals(200);
  }

}
