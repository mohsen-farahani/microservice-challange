<?php

namespace App\Publishers;

use Illuminate\Support\Str;

abstract class AbstractPublisher
{
    protected $data;
    protected $channle_name;

    /**
     * __construct
     *
     * @param  mixed $data
     * @return void
     */
    public function __construct(array $data)
    {
        $this->setData($data);
        $this->setChannleName();
    }

    /**
     * setData
     *
     * @param  mixed $data
     * @return self
     */
    private function setData(array $data): self
    {
        $this->data = json_encode($data);
        return $this;
    }

    /**
     * setChannleName
     *
     * @return self
     */
    private function setChannleName(): self
    {
        if ($this->channle_name) {
            return $this;
        }

        $childeClass        = get_called_class();
        $className          = Str::afterLast($childeClass, '\\');
        $className          = Str::snake($className);
        $this->channle_name = Str::upper($className);
        return $this;
    }
}
