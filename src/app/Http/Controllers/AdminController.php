<?php
namespace Stephane888\LaravelBlogs\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Stephane888\LaravelBlogs\Helpers;
use Stephane888\LaravelHtmlComponents\DisplayHelpers;
use Illuminate\Support\Facades\Route;
use View;
use App\EmtContentType;
use Symfony\Component\VarDumper\VarDumper;

class AdminController extends Controller {
  use Helpers;

  private $user_role = 'guest';

  function __construct()
  {
    $this->middleware('auth');
    $DS = new DisplayHelpers();
    $DS->RouteName = \Route::current()->getName();
    // echo \Route::current()->getName();
    View::share('DS', $DS);
  }

  public function ContentType()
  {
    $datas = $this->defaultContent();
    $datas['page_title'] = 'Type d\'articles';
    return view('LaravelBlogs::LaravelBlogs.pages.page', $datas);
  }

  public function ContentTypeAdd()
  {
    $datas = $this->defaultContent();
    $datas['page_title'] = 'Ajouter un type article';
    $datas['formAddContentType'] = [
      'inputs' => $this->formAddContentType(),
      'method' => 'POST',
      'form_action' => '/admin/content-type/add'
    ];
    return view('LaravelBlogs::LaravelBlogs.pages.page', $datas);
  }

  public function Contents()
  {
    $datas = $this->defaultContent();
    $datas['page_title'] = 'Articles';
    return view('LaravelBlogs::LaravelBlogs.pages.page', $datas);
  }

  public function ContentsAdd()
  {
    $datas = $this->defaultContent();
    $datas['page_title'] = 'Ajouter un article';
    $datas['formAddContents'] = [
      'inputs' => $this->formAddContents(),
      'method' => 'POST',
      'form_action' => '/admin/contents/add'
    ];
    return view('LaravelBlogs::LaravelBlogs.pages.page-form', $datas);
  }

  public function ContentTypeEdit($n)
  {
    $data = EmtContentType::find($n)->getAttributes();
    /*
     * echo '<pre>';
     * \print_r($data);
     * \print_r(\get_class_methods($data));
     * echo '</pre>';
     */
    $datas = $this->defaultContent();
    $datas['page_title'] = 'Modifier un article';
    $datas['formAddContentType'] = [
      'inputs' => $this->formAddContentType($data),
      'method' => 'PUT',
      'conditions' => [
        [
          'ref_label' => 'id',
          'ref_value' => $n
        ]
      ],
      'form_action' => '/admin/content-type/edit/' . $n
    ];
    return view('LaravelBlogs::LaravelBlogs.pages.page', $datas);
  }

  /**
   */
  public function index()
  {
    $user = config('roles.models.defaultUser')::find(auth()->id());
    return $user;
  }

  /**
   */
  public function superAdmin()
  {
    $datas = $this->defaultContent();
    return view('LaravelBlogs::LaravelBlogs.pages.starter', $datas);
    // return 'Super Admin';
  }

  /**
   * Liste les types de contenus, permettant d'ajouter de nouveau articles.
   */
  public function ContentTypeList()
  {
    $datas = $this->defaultContent();
    $datas['page_title'] = 'Selectionner un type d\'article';
    $datas['page_content'] = [
      [
        'model' => 'list',
        'url_base' => route(\Route::current()->getName()),
        'datas' => $this->getActiveContentTypeAll(),
        'url_patch' => 'id',
        'txt' => 'name',
        'CustomClass' => 'mw-800'
      ]
    ];
    return view('LaravelBlogs::LaravelBlogs.pages.page', $datas);
  }

  /**
   */
  public function blogAdmin()
  {
    return 'Admin blog';
  }

  /**
   */
  protected function defaultContent()
  {
    return [
      'items' => $this->buildTestmenu(),
      'aside_menu' => $this->buildManuAside()
    ];
  }
}
