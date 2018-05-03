<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Connection;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ConnectionTest extends TestCase
{
    /**
     * test connection to the githubapi.
     *
     * @return void
     */
    public function test_concecton_to_api()
    {
        $url="https://api.github.com/orgs/githubtraining/repos";
        $connection= new Connection();
        $this->assertInternalType('array',$connection->connect($url));
        $this->assertObjectHasAttribute('id',$connection->connect($url)[0]);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_get_last_connection()
    {
      $this->assertInstanceOf(Connection::class,Connection::getLastConecction());
    }
}
