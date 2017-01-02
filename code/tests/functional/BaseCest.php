<?php

namespace tests\codeception\functional;

/**
 * Class BaseCest
 *
 * @package tests\codeception\acceptance
 */
class BaseCest
{
    protected $response;

    /**
     * @param \AcceptanceTester $I
     */
    public function baseResourceGET(\FunctionalTester $I)
    {
        $I->wantTo(__METHOD__);

        $I->sendGET('/');
        $I->seeResponseCodeIs(200);
        $this->response = \json_decode($I->grabResponse());
    }

    /**
     * @param \AcceptanceTester $I
     */
    public function baseResourceDefaultCountGET(\FunctionalTester $I)
    {
        $I->wantTo(__METHOD__);
        $I->assertEquals(6, count($this->response));
    }
}

