<?php
namespace Stephane888\LaravelBlogs;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class BlogsServiceProvider extends ServiceProvider {

  private $_packageTag = 'LaravelBlogs';

  /**
   */
  public function boot()
  {
    if (config('Blogs.Show')) {
      $this->loadRoutesFrom(__DIR__ . '/routes/web.php');
    }
  }

  /**
   *
   * {@inheritdoc}
   * @see \Illuminate\Support\ServiceProvider::register()
   */
  public function register()
  {
    $this->mergeConfigFrom(__DIR__ . '/config/Blogs.php', 'Blogs');

    if (config('Blogs.Show')) {
      $this->loadViewsFrom(__DIR__ . '/resources/views/', $this->_packageTag);
    }
  }
}