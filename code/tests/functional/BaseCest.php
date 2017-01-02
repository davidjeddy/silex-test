<?php

namespace tests\codeception\functional;

/**
 * Class BaseCest
 *
 * @package tests\codeception\acceptance
 */
class BaseCest
{
    /**
     * @param \AcceptanceTester $I
     */
    public function baseResourceGET(\FunctionalTester $I)
    {
        $I->wantTo(__METHOD__);

        $I->sendGET('/');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
    }
}
