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


        $this->visit('/postjob')
             ->type('unittest_job_name', 'name')
             ->type('unittest_company', 'company')
             ->type('20000', 'salary')
             ->type('unittest_details', 'details')
             ->type('1', 'location_id')
             ->type('2', 'type_id')
             ->type('3', 'classification_id')
             ->press('Submit')
             ->see('unittest_job_name');


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
