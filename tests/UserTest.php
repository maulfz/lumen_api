<?php

class UserTest extends TestCase
{
    /**
     * /api/users [GET]
     */
    public function testShouldReturnAllUsers(){

        $this->get("api/users", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            '*' =>
                [
                    '_id',
                    'username',
                    'email',
                    // 'password',
                    'updated_at',
                    'created_at',
                ]
        ]);
        
    }

    /**
     * /api/users/{id} [GET]
     */
    public function testShouldReturnUser(){
        $this->get("api/users/6004ff128f673225dc003732", []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [
                '_id',
                'username',
                'email',
                // 'password',
                'updated_at',
                'created_at',
            ]
        );
        
    }

    /**
     * /api/users [POST]
     */
    public function testShouldCreateUser(){

        $parameters = [
            "username" => "User3",
            "email" => "user3@denmaul.com",
            "password" => "thirduser",
        ];

        $this->post("/api/users", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [
                '_id',
                'username',
                'email',
                // 'password',
                'updated_at',
                'created_at',
            ]  
        );
        
    }
    
    /**
     * /api/users/{id} [PUT]
     */
    public function testShouldUpdateUser(){

        $parameters = [
            "username" => "User33",
            "email" => "user33@denmaul.com",
            "password" => "third3user",
        ];

        $this->put("api/users/600519ee8f67320a240068c2", $parameters, []);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            [
                '_id',
                'username',
                'email',
                // 'password',
                'updated_at',
                'created_at',
            ] 
        );
    }

    /**
     * /api/users/{id} [DELETE]
     */
    public function testShouldDeleteUser(){
        $this->delete("api/users/600519ee8f67320a240068c2", [], []);
        //$this->seeStatusCode(410);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
                'status',
                'message'
        ]);
    }
}