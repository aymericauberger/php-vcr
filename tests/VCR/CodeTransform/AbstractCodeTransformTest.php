<?php

namespace VCR\CodeTransform;

class AbstractCodeTransformTest extends \PHPUnit\Framework\TestCase
{
    protected function getFilter(array $methods = [])
    {
        $defaults = array_merge(
            ['transformCode'],
            $methods
        );

        $filter = $this->getMockBuilder('\VCR\CodeTransform\AbstractCodeTransform')
            ->setMethods($defaults)
            ->getMockForAbstractClass();

        if (in_array('transformCode', $methods)) {
            $filter
                ->expects($this->once())
                ->method('transformCode')
                ->with($this->isType('string'))
                ->will($this->returnArgument(0));
        }

        return $filter;
    }

    public function testRegisterAlreadyRegistered()
    {
        $filter = $this->getFilter();
        $filter->register();

        $this->assertAttributeSame(true, 'isRegistered', $filter, 'First attempt to register failed.');

        $filter->register();

        $this->assertAttributeSame(true, 'isRegistered', $filter, 'Second attempt to register failed.');
    }
}
