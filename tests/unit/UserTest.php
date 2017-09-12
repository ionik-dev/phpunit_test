<?php
ini_set('xdebug.show_exception_trace', 0);

class UserTest extends \PHPUnit_Framework_TestCase
{

    protected $user;

    public function setUp()
    {
        $this->user = new \App\Models\User;
    }

    /** @test */
    public function can_get_first_name()
    {
        $this->user->setFirstName('Billy');

        $this->assertEquals($this->user->getFirstName(), 'Billy');
    }

    /** @test */
    public function canGetLastName()
    {
        $this->user->setLastName('Garrett');

        $this->assertEquals($this->user->getLastName(), 'Garrett');
    }

    /** @test */
    public function canGetFullName()
    {
        $this->user->setFirstName('Billy');
        $this->user->setLastName('Garrett');

        $this->assertEquals($this->user->getFullName(), 'Billy Garrett');
    }

    /** @test */
    public function firstNameAndLastNameAreTrimmed()
    {
        $this->user->setFirstName(' Billy  ');
        $this->user->setLastName('   Garrett  ');

        $this->assertEquals($this->user->getFirstName(), 'Billy');
        $this->assertEquals($this->user->getLastName(), 'Garrett');
    }

    /** @test */
    public function emailAddressCanBeSet()
    {
        $this->user->setEmail('billy@codecourse.com');

        $this->assertEquals($this->user->getEmail(), 'billy@codecourse.com');
    }

    /** @test */
    public function emailVariablesContainCorrentValues()
    {
        $this->user->setFirstName('Billy');
        $this->user->setLastName('Garrett');
        $this->user->setEmail('billy@codecourse.com');

        $emailVariables = $this->user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);


        $this->assertEquals($emailVariables['full_name'], 'Billy Garrett');
        $this->assertEquals($emailVariables['email'], 'billy@codecourse.com');
    }
}