<?php
/**
 * Created by PhpStorm.
 * User: Gideao
 * Date: 25/05/2016
 * Time: 22:08
 */

namespace CodeProject\Transformers;

use CodeProject\Entities\Client;
use League\Fractal\TransformerAbstract;

class ClientTransformer extends TransformerAbstract
{

    public function transform(Client $client)
    {
        return [
            'id' => $client->id,
            'name' => $client->name
        ];
    }

}