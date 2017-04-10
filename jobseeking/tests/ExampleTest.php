<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        /*
        $this->visit('/')
             ->see('Home');
        */

        /*        
        $this->visit('/findjob')
             ->type('hhh', 'name')
             ->press('search')
             ->see('hhh');
             //->seePageIs('/findjob?classification_id=&company=&details=&id=&location_id=&name=hhh&salary_bottom=0&salary_top=99999999999999&type_id=&user_name=');
        */


        $response = $this->call('POST', '/api/postjob', ['name' => 'unittest_job_name',
                                                        'company' => 'unittest_company',
                                                        'salary' => '20000',
                                                        'details' => 'unittest_details',
                                                        'location_id' => '1',
                                                        'type_id' => '2',
                                                        'classification_id' => '',
                                                        'user_id' => '13'
                                                       ]);
        $this->assertContains("showjob", $response->content());


        /*             
       $this->json('POST', '/api/authenticate', ['email' => 'rrr@rrr.rrr', 'password' => '123456'])
            ->seeJsonStructure([
                 'token'                 
             ]);
        */

        /*     
        $this->json('POST', '/api/register', ['email' => rand().'@gmail.com',
                                              'password' => '123456',
                                              'name' => 'unittest_name',
                                              'last_name' => 'unittest_last_name'])
             ->seeJsonStructure([
                 'name'                 
             ]);
        */

    }
}
