<?php

namespace Drupal\Tests\tdd_dublin\Functional;

use Drupal\Tests\BrowserTestBase;

class PageListTest extends BrowserTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = ['tdd_dublin'];

  /**
   * Test that the pages listing page exists and is accessible.
   */
  public function testListingPageExists() {
    // Go to /pages and check that it is accessible by checking the status
    // code.
    $this->drupalGet('pages');
    $this->assertSession()->statusCodeEquals(200);
  }

  /**
   * Ensure that only the correct nodes are returned.
   *
   * Ensure that only published pages are returned by the view. Unpublished
   * pages or content of different types should not be shown.
   */
  public function testOnlyPublishedPagesAreShown() {
    $this->drupalCreateContentType(['type' => 'article']);

    // This is a published page, so it should be visible.
    $this->drupalCreateNode(['type' => 'page', 'status' => TRUE]);

    // This is an article, so it should not be visible.
    $this->drupalCreateNode(['type' => 'article']);

    // This page is not published, so it should not be visible.
    $this->drupalCreateNode(['type' => 'page', 'status' => FALSE]);

    // When I view the page.

    // Then I should only see the published pages.
  }

}