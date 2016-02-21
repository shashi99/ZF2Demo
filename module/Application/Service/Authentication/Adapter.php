<?php
namespace Application\Service\Authentication;

use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\Result as AuthResult;

class Adapter implements AdapterInterface
{

    private $entityRepository;

    private $passwordEncoder;

    private $identity;
    
    private $credential;
    
    private $identityColumn;
    
    /**
     *
     * @return void
     */
    public function __construct($entityRepository, $identityColumn, $passwordEncoder)
    {
        $this->entityRepository = $entityRepository;
        $this->identityColumn = $identityColumn;
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * Performs an authentication attempt
     *
     * @return \Zend\Authentication\Result
     * @throws \Zend\Authentication\Adapter\Exception\ExceptionInterface If authentication cannot be performed
     */
    public function authenticate()
    {
        $userIndentity = $this->entityRepository->findOneBy(array(
            $this->identityColumn => $this->getIdentity()
        ));

        $status = 'FAILED';
        if ($userIndentity) {
            $isVerified = $this->passwordEncoder->verify($this->credential, $userIndentity->getPassword());
            
            if ($isVerified && $userIndentity->isActive()) {
                $status = 'SUCCESS';
                $this->setIdentity($userIndentity);
            }
        }

        return $this->authenticationResult($status);
    }

    public function getIdentity()
    {
        return $this->identity;
    }

    public function setIdentity($identity)
    {
        $this->identity = $identity;
        return $this;
    }

    public function getCredential()
    {
        return $this->credential;
    }

    public function setCredential($credential)
    {
        $this->credential = $credential;
        return $this;
    }

    protected function authenticationResult($status)
    {
        if ($status == 'SUCCESS') {
            $code = AuthResult::SUCCESS;
            $message = 'Authentication successful.';
        } elseif ($status == 'FAILED') {
            $code = AuthResult::FAILURE_CREDENTIAL_INVALID;
            $message = 'Invalid credentials.';
        }

        return new AuthResult($code, $this->getIdentity(), array(
            $message
        ));
    }

    public function getEntityRepository()
    {
        return $this->entityRepository;
    }

    public function setEntityRepository($entityRepository)
    {
        $this->entityRepository = $entityRepository;
        return $this;
    }

    public function getPasswordEncoder()
    {
        return $this->passwordEncoder;
    }

    public function setPasswordEncoder($passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
        return $this;
    }

    public function getIdentityColumn()
    {
        return $this->identityColumn;
    }

    public function setIdentityColumn($identityColumn)
    {
        $this->identityColumn = $identityColumn;
        return $this;
    }
}