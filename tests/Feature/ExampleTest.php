<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Providers\RouteServiceProvider;
class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     */
    
 
    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->call('GET','/register');
 
        $response->assertStatus(200);
    }
 
    public function test_new_users_can_register()
    {
        $response = $this->call('POST','add', [
            'name'=>'ziad samir',
            'username'=>'elzox500',
            'phone'=>'01015787593',
            'birthday'=>'03/09/2001',
            'address'=>'1234 giza',
            'password'=>'1234....',
            'confirmPassword'=>'1234....',
            'userImage'=>'',
            'email'=>'ziadmohamed997@gmail.com'
        ]);
        
        // $this->assertAuthenticated();
        // $response->assertStatus(200);
    }
  
    
}
