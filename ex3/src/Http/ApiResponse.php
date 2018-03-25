<?php

namespace App\Http\Response;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * API response.
 */
class ApiResponse
{
    const HTTP_OK                    = Response::HTTP_OK;
    const HTTP_BAD_REQUEST           = Response::HTTP_BAD_REQUEST;
    const HTTP_NOT_FOUND             = Response::HTTP_NOT_FOUND;
    const HTTP_FORBIDDEN             = Response::HTTP_FORBIDDEN;
    const HTTP_METHOD_NOT_ALLOWED    = Response::HTTP_METHOD_NOT_ALLOWED;
    const HTTP_UNAUTHORIZED          = Response::HTTP_UNAUTHORIZED;
    const HTTP_INTERNAL_SERVER_ERROR = Response::HTTP_INTERNAL_SERVER_ERROR;
    const HTTP_SERVICE_UNAVAILABLE   = Response::HTTP_SERVICE_UNAVAILABLE;

    /** @var int $status the HTTP status. */
    private $status = Response::HTTP_OK;

    /** @var string $message the message. */
    private $message = 'OK';

    /** @var string $data the optional data in the response. */
    private $data = null;

    /**
     * Constructor.
     * @param int    $status      the HTTP status code
     * @param mixed  $data        some data to add in the response body
     * @param string $message     message to use instead of standard HTTP status message
     */
    public function __construct($status, $data = null, $message = null)
    {
        $this->status = $status;
        $this->data   = $data;

        switch ($status)
        {
            case Response::HTTP_OK :                    $this->message = 'OK';
                                                        break;
            case Response::HTTP_BAD_REQUEST :           $this->message = 'Bad Request';
                                                        break;
            case Response::HTTP_NOT_FOUND :             $this->message = 'Not Found';
                                                        break;
            case Response::HTTP_FORBIDDEN :             $this->message = 'Forbidden';
                                                        break;
            case Response::HTTP_UNAUTHORIZED :          $this->message = 'Unauthorized';
                                                        break;
            case Response::HTTP_METHOD_NOT_ALLOWED :    $this->message = 'Method Not Allowed';
                                                        break;
            case Response::HTTP_INTERNAL_SERVER_ERROR : $this->message = 'Internal Server Error';
                                                        break;
            case Response::HTTP_SERVICE_UNAVAILABLE :   $this->message = 'Service Unavailable';
                                                        break;
            default :                                   $this->message = 'Bad Request';
                                                        break;
        }

        if (is_null($message) === false) {
            $this->message = $message;
        }
    }

    /**
     * Gets the response in Symfony format.
     * @return mixed the formatted response
     */
    public function getResponse()
    {
        $content = array(
            'status'  => $this->status,
            'message' => $this->message
        );

        if (is_null($this->data) === false) {
            $content['data'] = $this->data;
        }
       
        return new JsonResponse(
            $content, 
            $this->status
        );
    }
}
