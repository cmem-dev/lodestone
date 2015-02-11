<?php
namespace Lodestone;

class ObjectTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    /**
     * @cover Object::className
     */
    public function testClassName_ClassNameコール時_コールされたクラス名が返る()
    {
        $obj = new ObjectMock();
        $this->assertEquals(
            'Lodestone\ObjectMock',
            $obj->className()
        );
    }


    /**
     * @cover Object::_set
     */
    public function testSet_publicフィールド値の設定時_値がセットできる()
    {
        $obj = new ObjectMock();
        $obj->publicField = 1;
        $this->assertEquals(
            1,
            $obj->publicField
        );
    }

    /**
     * @cover Object::_set
     */
    public function testSet_protectedフィールド値の設定_例外が返る()
    {
        $obj = new ObjectMock();
        $this->setExpectedException('Lodestone\Exception\UnknownPropertyException');
        $obj->protectedField = 2;
    }

    /**
     * @cover Object::_set
     */
    public function testSet_privateフィールド値の設定_例外が返る()
    {
        $obj = new ObjectMock();
        $this->setExpectedException('Lodestone\Exception\UnknownPropertyException');
        $obj->protectedField = 3;
    }

    /**
     * @cover Object::_set
     */
    public function testSet_writeOnlyフィールド値の設定時_値が設定できる()
    {
        $obj = new ObjectMock();
        $obj->writeOnlyField = 4;
    }

    /**
     * @cover Object::_set
     */
    public function testSet_readOnlyフィールド値の設定時_例外が返る()
    {
        $obj = new ObjectMock();
        $this->setExpectedException('Lodestone\Exception\InvalidCallException');
        $obj->readOnlyField = 5;
    }


    /**
     * @cover Object::_get
     */
    public function testGet_publicフィールド値の取得時_値を取得できる()
    {
        $obj = new ObjectMock(["publicField"=>1]);
        $this->assertEquals(
            1,
            $obj->publicField
        );
    }

    /**
     * @cover Object::_get
     */
    public function testGet_protectedフィールド値の取得時_例外が返る()
    {
        $obj = new ObjectMock(["protectedField"=>2]);
        $this->setExpectedException('Lodestone\Exception\UnknownPropertyException');
        echo $obj->protectedField;
    }

    /**
     * @cover Object::_get
     */
    public function testGet_privateフィールド値の取得時_例外が返る()
    {
        $obj = new ObjectMock();
        $this->setExpectedException('Lodestone\Exception\UnknownPropertyException');
        echo $obj->protectedField;
    }

    /**
     * @cover Object::_get
     */
    public function testGet_writeOnlyフィールド値の取得_例外が返る()
    {
        $obj = new ObjectMock();
        $this->setExpectedException('Lodestone\Exception\InvalidCallException');
        echo $obj->writeOnlyField;
    }

    /**
     * @cover Object::_get
     */
    public function testGet_readOnlyフィールド値の取得時_値が取得できる()
    {
        $obj = new ObjectMock();
        $this->assertEquals(
            5,
            $obj->readOnlyField
        );
    }

    /**
     * @cover Object::_isset
     */
    public function testIsset_privateかつnull値へアクセス時_falseが返る()
    {
        $obj = new ObjectMock();
        $this->assertFalse(
            isset($obj->privateField)
        );
    }

    /**
     * @cover Object::_isset
     */
    public function testIsset_privateかつ有効データへアクセス時_trueが返る()
    {
        $obj = new ObjectMock(["privateField" => 5]);
        $this->assertTrue(
            isset($obj->privateField)
        );
    }
    /**
     * @cover Object::_isset
     */
    public function testIsset_getterが存在しないデータへアクセス時_falseが返る()
    {
        $obj = new ObjectMock(["setterOnlyField" => 5]);
        $this->assertFalse(
            isset($obj->setSetterOnlyField)
        );
    }

    /**
     * @cover Object::_unset
     */
    public function testUnset_writeOnlyフィールドunset時_nullが設定される()
    {
        $obj = new ObjectMock();
        unset($obj->writeOnlyField);
    }

    public function testUnset_readOnlyフィールドunset時_例外が返る()
    {
        $obj = new ObjectMock();
        $this->setExpectedException('Lodestone\Exception\InvalidCallException');
        unset($obj->readOnlyField);
    }

    public function testCall_存在しないMethodコール時_例外が返る()
    {
        $obj = new ObjectMock();
        $this->setExpectedException('Lodestone\Exception\UnknownMethodException');
        $obj->unknownMethod();
    }

    public function testHasProperty_存在するフィールドの確認時_trueが返る()
    {
        $obj = new ObjectMock();
        $this->assertTrue(
            $obj->hasProperty('readOnlyField',true)
        );
    }

    public function testHasProperty_存在しないフィールドの確認時_falseが返る()
    {
        $obj = new ObjectMock();
        $this->assertFalse(
            $obj->hasProperty('unknownField',true)
        );
    }

    public function testCanGetProperty_Getterが存在するフィールドの確認時_trueが返る()
    {
        $obj = new ObjectMock();
        $this->assertTrue(
            $obj->canGetProperty('readOnlyField', false)
        );
    }

    public function testCanGetProperty_Getterが存在しないフィールドの確認時_falseが返る()
    {
        $obj = new ObjectMock();
        $this->assertFalse(
            $obj->canGetProperty('unknownField', false)
        );
    }

    public function testCanSetProperty_setterが存在するフィールドのsetter確認時_trueが返る()
    {
        $obj = new ObjectMock();
        $this->assertTrue(
            $obj->canSetProperty('writeOnlyField', false)
        );
    }

    public function testCanSetProperty_setterが存在しないフィールドのsetter確認時_falseが返る()
    {
        $obj = new ObjectMock();
        $this->assertFalse(
            $obj->canSetProperty('readOnlyField', false)
        );
    }

    public function testHasMethod_存在するmethod確認時_trueが返る()
    {
        $obj = new ObjectMock();
        $this->assertTrue(
            $obj->hasMethod('setPrivateField', false)
        );
    }

    public function testHasMethod_存在しないmethod確認時_falseが返る()
    {
        $obj = new ObjectMock();
        $this->assertFalse(
            $obj->hasMethod('unknownMethod', false)
        );
    }
}

class ObjectMock extends Object
{
    public    $publicField;
    protected $protectedField;
    private   $privateField;
    private   $setterOnlyField;

    private   $writeOnlyField;
    private   $readOnlyField = 5;

    public function setPrivateField($value){$this->privateField = $value;}
    public function getPrivateField(){return $this->privateField;}
    public function setWriteOnlyField($value){$this->writeOnlyField = $value;}
    public function getReadOnlyField(){return $this->readOnlyField;}
    public function setSetterOnlyField($value){$this->setterOnlyField = $value;}

}
