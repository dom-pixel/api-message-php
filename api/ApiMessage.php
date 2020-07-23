<?php


namespace Api;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ApiMessage
{
    /**
     * Formata uma mensagem para envio na API.
     *
     * @param boolean $isSuccess Resposta se o resultado da operação foi bem sucedido.
     * @param integer $code O código da resposta, geralmente igual o código HTTP da resposta.
     * @param string [$message=null] A mensagem de resposta. Ela é um resumo do que a operação realizou e pode ser utilizada na exibição para o uusário.
     * @param mixed [$payload=null] Os dados a serem enviados na requisição, caso existam.
     * Os dados enviados podem ser um objeto ou um array de objetos, dependendo da chamada a API.
     *
     * Caso este parâmetro seja uma instância de `LengthAwarePaginator` o retorno formatado será um objeto com informações de paginação.
     *
     * @return mixed A resposta para a API formatada com os parâmetros passados.
     *
     * O resultado tem o seguinte formato:
     * ```
     * [
     *     'isSuccess' => true // Resultado da operação.
     *     'message' => 'Operação realizada com êxito.' // A mensagem de resultado.
     *     'code' => 200 // O código do resultado.
     *     'payload' => [] // O resultado da operação
     * ]
     * ```
     *
     * Caso haja **paginação** o `payload` é **automaticamente** transformado da seguinte maneira:
     * ```
     * [
     *     'items' => [] // Lista de itens na página atual.
     *     'last_page' => 4 // Ultima página da lista.
     *     'total' => 43 // Total de items na lista.
     *     'items_per_page' => 12 // Número máximo de itens por página.
     * ]
     * ```
     */
    public static function message($isSuccess, $code, $message = null, $payload = null)
    {
        if ($payload instanceof LengthAwarePaginator) {
            $payload = (object) [
                'items' => $payload->items(),
                'last_page' => $payload->lastPage(),
                'total' => $payload->total(),
                'items_per_page' => $payload->perPage()
            ];
        }

        return [
            'isSuccess' => $isSuccess,
            'message' => $message,
            'payload' => $payload,
            'code' => $code
        ];
    }
}




