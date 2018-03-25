<?php

namespace App\Http;

use Symfony\Component\HttpFoundation\Request;

/**
 * API request.
 */
class ApiRequest
{
    /** @var Symfony\Component\HttpFoundation\Request $request the original request. */
    protected $request = null;

    /** @var array $data the extracted data from the request. */
    protected $data = array();

    /**
     * Constructor.
     * @param Symfony\Component\HttpFoundation\Request $request the original request
     */
    public function __construct(Request $request)
    {
        $requestContent = json_decode($request->getContent(), true);

        if (!empty($requestContent)) {
            foreach ($requestContent as $key => $value) {
                if ($key === 'data') {
                    foreach ($value as $dataKey => $dataValue) {
                        $this->data['data'][$dataKey] = $dataValue;
                    }
                }
            }
        }

        $this->request = $request;
    }

    /**
     * Gets a specific data parameter.
     * @param string $dataKey the data key
     * @return mixed the data value
     */
    public function getDataParam($dataKey)
    {
        return $this->data['data'][$dataKey] ?? null;
    }
}
