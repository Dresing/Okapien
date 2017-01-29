<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class APIController extends Controller
{

    //Respond with a default of success
    protected $statusCode = 200;

    //Maximum number of records to return
    protected $limit = 20;

    //Maximum number of records to return
    protected $default = 10;

    public function getStatusCode()
    {
        return $this->statusCode;
    }


    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function respond($data, $headers = []){
        return $this->setStatusCode(200)->respondSuccess($data, $headers);
    }
    public function respondNotFound($message = 'Resource not found.'){
        return $this->setStatusCode(404)->respondError($message);
    }
    private function respondError($message){
        return Response::json([
            'status' => $this->getStatusCode(),
            'error' => [
                'message' => $message,
            ]
        ]);
    }
    private function respondSuccess($data){
        return Response::json([
            'status' => $this->getStatusCode(),
            'data' => $data,
        ]);
    }

    protected function respondPagination($data, LengthAwarePaginator $paginator){
        return Response::json([
            'status' => $this->getStatusCode(),
            'data' => $data,
            'paginator' => [
                'total_count' => $paginator->total(),
                'current_page' => $paginator->currentPage(),
                'last_page' => $paginator->lastPage(),
                'previous_page_url' => $paginator->previousPageUrl(),
                'next_page_url' => $paginator->nextPageUrl(),
            ]
        ]);
    }
    protected function respondUnauthorized($message = 'Unauthorized.'){}

    /** Checks if the requested number of entries is below the limit and is set
     *  and otherwise returns the default.
     *
     * @return int
     */
    protected function getLimit(){
        $requestedEntriesNum = Input::get('limit');
        if($requestedEntriesNum){
            if($requestedEntriesNum <= $this->limit){
                return $requestedEntriesNum;
            }
        }
        return $this->default;
    }

}
