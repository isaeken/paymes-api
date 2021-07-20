<?php


namespace IsaEken\Paymes\Traits;



use IsaEken\Paymes\Str;

trait HasAttributes
{
    /**
     * @return mixed
     */
    protected function __getModel()
    {
        return $this;
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        $name = Str::of($name);

        if ($name->startsWith('set')) {
            $attributeName = $name->after('set')->beforeLast('Attribute')->camel()->__toString();

            if ($this->hasAttribute($attributeName)) {
                $this->setAttribute($attributeName, $arguments[0]);
                return $this;
            }
        }

        if ($name->startsWith('get')) {
            $attributeName = $name->after('get')->beforeLast('Attribute')->camel()->__toString();

            if ($this->hasAttribute($attributeName)) {
                return $this->getAttribute($attributeName);
            }
        }

        $name = $name->__toString();
        return $this->$name(...$arguments);
    }

    /**
     * @param array $attributes
     * @return $this
     */
    public function fill(array $attributes = []): self
    {
        $this->__getModel()->attributes = $attributes;
        return $this;
    }

    /**
     * @param array $attributes
     * @return $this
     */
    public function setAttributes(array $attributes): self
    {
        $this->__getModel()->attributes = $attributes;
        return $this;
    }

    /**
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->__getModel()->attributes;
    }

    /**
     * @param string $name
     * @return bool
     */
    public function hasAttribute(string $name): bool
    {
        return array_key_exists($name, $this->__getModel()->attributes);
    }

    /**
     * @param string $name
     * @param $value
     * @return $this
     */
    public function setAttribute(string $name, $value): self
    {
        $this->__getModel()->attributes[$name] = $value;
        return $this;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function getAttribute(string $name)
    {
        return $this->__getModel()->attributes[$name];
    }
}
