<?php
/**
 * Created by PhpStorm.
 * User: alive
 * Date: 10/2/18
 * Time: 3:26 PM
 */

namespace Alive2212\LaravelEchargeService\Models;


use SoapVar;

class SoapSecurity extends SoapObjectModel
{
    public $UsernameToken = null;

    protected $nameSpace = null;

    protected $token = null;

    function __construct(SoapToken $token, string $nameSpace)
    {
        $this->setToken($token);
        $this->setNameSpace($nameSpace);
        $this->setUsernameToken();
    }

    /**
     * @return SoapVar
     */
    public function getUsernameToken(): SoapVar
    {
        return $this->UsernameToken;
    }

    /**
     * @param SoapVar|null $usernameToken
     * @return $this
     */
    public function setUsernameToken(SoapVar $usernameToken = null)
    {
        if (is_null($usernameToken)) {
            $this->UsernameToken = new SoapVar(
                $this->getToken()->getStd(),
                SOAP_ENC_OBJECT,
                null,
                $this->getNameSpace(),
                'UsernameToken',
                $this->getNameSpace()
            );
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNameSpace(): string
    {
        return $this->nameSpace;
    }

    /**
     * @param string $nameSpace
     * @return $this
     */
    public function setNameSpace(string $nameSpace)
    {
        $this->nameSpace = $nameSpace;
        return $this;
    }

    /**
     * @return SoapToken
     */
    public function getToken(): SoapToken
    {
        return $this->token;
    }

    /**
     * @param SoapToken $token
     * @return $this
     */
    public function setToken(SoapToken $token)
    {
        $this->token = $token;
        return $this;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        $params = [
            'UsernameToken' => $this->getUsernameToken(),
        ];
        return $params;
    }
}