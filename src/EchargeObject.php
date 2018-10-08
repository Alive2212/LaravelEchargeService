<?php
/**
 * Created by PhpStorm.
 * User: alive
 * Date: 10/4/18
 * Time: 2:32 PM
 */

namespace Alive2212\LaravelEchargeService;


use Alive2212\LaravelEchargeService\Models\SoapSecurity;
use Alive2212\LaravelEchargeService\Models\SoapToken;
use SoapClient;
use SoapHeader;

class EchargeObject
{
    protected $username;

    protected $password;

    protected $url;

    protected $nameSpace;

    protected $context;

    protected $options;

    protected $token;

    protected $securityValues;

    protected $headers;

    protected $client;

    protected $merchantId;

    function __construct()
    {
//        dd('here');
//
//        $this->securityValues = new SoapSecurity($this->getToken(), $this->getNameSpace());
//        $this->headers = $this->setSoapHeader($this->securityValues);

//        $securityValues = new SoapSecurity($this->getToken(), $this->getNameSpace());
//        dd($securityValues);
//        dd('hello');
//        dd($securityValues);
//        dd($securityValues->getStd());
//        $headers = $this->setSoapHeader($securityValues);
//        $this->client = $this->initSoapClient(
//            $this->getOptions(),
//            $this->headers
//        );
//            dd($client->__getFunctions());
//        $this->merchantId = (int) 5114;
//
//        $getStatusParameters = new stdClass();
//        $getStatusParameters->MerchantId = 5114;
//        dd($this->getClient());
//        dd($this->getClient()->GetBalance(["request" => $getStatusParameters]));
//        dd($this->getClient()->GetBalance(5114));
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        if (is_null($this->username)) {
            return config('laravel-echarge-service.username');
        }
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        if (is_null($this->password)) {
            return config('laravel-echarge-service.password');
        }
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        if (is_null($this->password)) {
            return config('laravel-echarge-service.url');
        }
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getNameSpace(): string
    {
        if (is_null($this->nameSpace)) {
            return config('laravel-echarge-service.ns');
        }
        return $this->nameSpace;
    }

    /**
     * @param string $nameSpace
     */
    public function setNameSpace(string $nameSpace)
    {
        $this->nameSpace = $nameSpace;
    }

    /**
     * @param $opts
     * @param $headers
     * @return SoapClient
     */
    public function initSoapClient($opts, $headers): SoapClient
    {
        $client = new SoapClient(
            $this->getUrl(),
            $opts
        );
        $client->__setSoapHeaders($headers);
        return $client;
    }

    /**
     * @return resource
     */
    public function getContext()
    {
        if (is_null($this->context)) {
            return stream_context_create(
                config('laravel-echarge-service.soap.stream_context')
            );
        }
        return $this->context;
    }

    /**
     * @param resource $context
     */
    public function setContext($context)
    {
        $this->context = $context;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        if (is_null($this->options)) {
            $params = config('laravel-echarge-service.soap.options');
            $params = array_add($params, 'stream_context', $this->getContext());
            return $params;
        }
        return $this->options;
    }

    /**
     * @param array $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }

    /**
     * @return SoapToken
     */
    public function getToken(): SoapToken
    {
        if (is_null($this->token)) {
            return new SoapToken(
                $this->getUsername(),
                $this->getPassword(),
                $this->getNameSpace()
            );
        }
        return $this->token;
    }

    /**
     * @param SoapToken $token
     */
    public function setToken(SoapToken $token)
    {
        $this->token = $token;
    }

    /**
     * @return SoapSecurity
     */
    public function getSecurityValues(): SoapSecurity
    {
        if (is_null($this->securityValues)) {
            return $this->securityValues = new SoapSecurity(
                $this->getToken(),
                $this->getNameSpace()
            );
        }
        return $this->securityValues;
    }

    /**
     * @param SoapSecurity $securityValues
     */
    public function setSecurityValues(SoapSecurity $securityValues)
    {
        $this->securityValues = $securityValues;
    }

    /**
     * @return SoapHeader
     */
    public function getHeaders(): SoapHeader
    {
        if (is_null($this->headers)) {
            $headers = new SOAPHeader(
                $this->getNameSpace(),
                'Security',
                $this->getSecurityValues()->getStd(),
                true
            );
            return $headers;

        }
        return $this->headers;
    }

    /**
     * @param mixed $headers
     */
    public function setHeaders(SoapHeader $headers)
    {
        $this->headers = $headers;
    }

    /**
     * @return SoapClient
     */
    public function getClient(): SoapClient
    {
        if (is_null($this->client)) {
            $client = new SoapClient(
                $this->getUrl(),
                $this->getOptions()
            );
            $client->__setSoapHeaders($this->getHeaders());
            return $client;
        }
        return $this->client;
    }

    /**
     * @param SoapClient $client
     */
    public function setClient(SoapClient $client)
    {
        $this->client = $client;
    }

    /**
     * @return int
     */
    public function getMerchantId(): int
    {
        if (is_null($this->merchantId)) {
            return config('laravel-echarge-service.merchant_id');
        }
        return $this->merchantId;
    }

    /**
     * @param int $merchantId
     */
    public function setMerchantId(int $merchantId)
    {
        $this->merchantId = $merchantId;
    }

}