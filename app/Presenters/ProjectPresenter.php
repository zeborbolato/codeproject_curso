<?php
/**
 * Created by PhpStorm.
 * User: Gideao
 * Date: 25/05/2016
 * Time: 21:11
 */

namespace CodeProject\Presenters;


use CodeProject\Transformers\ProjectTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class ProjectPresenter extends FractalPresenter
{

    public function getTransformer()
    {
        return new ProjectTransformer();
    }

}