<?php
/**
 * Created by PhpStorm.
 * User: alive
 * Date: 10/2/18
 * Time: 3:28 PM
 */

namespace Alive2212\LaravelEchargeService\Models;

use SoapVar;

class SoapToken extends SoapObjectModel
{
    /**
     * user that was sent to your email inbox
     *
     * @var null
     */
    public $Username = null;

    /**
     * password that was sent to your email inbox
     *
     * @var null
     */
    public $Password = null;


    function __construct(string $username, string $password, string $nameSpace)
    {
        $this->setNameSpace($nameSpace);
        $this->setUsername($username);
        $this->setPassword($password);
    }

    /**
     * @return SoapVar
     */
    public function getUsername(): SoapVar
    {
        return $this->Username;
    }

    /**
     * @param string $username
     * @return $this
     */
    public function setUsername(string $username)
    {

        $this->Username = new SOAPVar(
            $username,
            XSD_STRING,
            null,
            $this->getNameSpace(),
            null,
            $this->getNameSpace()
        );
        return $this;
    }

    /**
     * @return SoapVar
     */
    public function getPassword(): SoapVar
    {
        return $this->Password;
    }

    /**
     * @param string $password
     * @return $this
     */
    public function setPassword(string $password)
    {
        $this->Password = new SOAPVar(
            $password,
            XSD_STRING,
            null,
            $this->getNameSpace(),
            null,
            $this->getNameSpace()
        );
        return $this;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        $params = [
            'Username' => $this->getUsername(),
            'Password' => $this->getPassword(),
        ];
        return $params;
    }
}