<?php
/**
 * Created by PhpStorm.
 * User: Gideao
 * Date: 25/05/2016
 * Time: 22:42
 */

namespace CodeProject\Presenters;


use CodeProject\Transformers\ClientTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class ClientPresenter extends FractalPresenter
{

    public function getTransformer()
    {
        return new ClientTransformer();
    }

}