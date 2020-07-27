<?php

namespace Sindria\Models\Base;

use Illuminate\Database\Eloquent\Model;

class Marketplace extends Model
{
    /**
     * The connection name for the model.
     *
     * @var string|null
     */
    protected $connection = 'marketplace';

    /**
     * Setup Base Marketplace model constructor.
     * Modify connection to adjust with testing env.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $connection = config('app.env') !== 'testing'
            ? 'marketplace'
            : config('database.default');

        $this->setConnection($connection);
    }
}