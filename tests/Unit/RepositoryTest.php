<?php

namespace Tests\Unit;
use App\Repository;
use App\Http\Controllers\RepositoryController;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RepositoryTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_index_method_retunrs_all_repocitories()
    {
        $this->get('/repositories')->assertStatus(200);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_get_repositories_data()
    {
        $rc=new RepositoryController();
        $this->assertInstanceOf(Repository::class,$rc->getRepositoriesData()->first());
    }
}
