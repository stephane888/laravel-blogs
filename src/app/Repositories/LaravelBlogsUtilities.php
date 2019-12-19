<?php
namespace Stephane888\LaravelBlogs\App\Repositories;

class LaravelBlogsUtilities {

  /**
   * permet de sauvegarder les données provenant d'un formulaires.
   * permet de sauvergarder les formulaires d'isposant d'un constructeur PHP.
   *
   * @param Object $ModelTable
   * @param array $forms
   * @param Object $request
   */
  public static function buildDatasFormsAndSave($ModelTable, $forms, $request)
  {
    foreach ($forms as $field) {
      if ($field['type'] == 'checkbox') {
        $ModelTable->{$field['name']} = (! empty($request->{$field['name']})) ? 1 : 0;
      } elseif ($field['type'] == 'dateheure') {
        $ModelTable->{$field['name']} = strtotime($request->{$field['name']});
      } else {
        $ModelTable->{$field['name']} = $request->{$field['name']};
      }
    }
    if (\count($forms)) {
      $ModelTable->save();
    }
  }
}