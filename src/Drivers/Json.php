<?php

namespace Mrluke\Settings\Drivers;

use InvalidArgumentException;
use Mrluke\Settings\Concerns\Castable;

/**
 * Json driver for SettingsManager.
 *
 * @author    Łukasz Sitnicki (mr-luke)
 *
 * @link      http://github.com/mr-luke/settings-manager
 *
 * @license   MIT
 */
class Json extends Driver
{
    use Castable;

    /**
     * Raw data loaded from storage.
     *
     * @var Illuminate\Support\Collection
     */
    protected $raw;

    public function __construct(array $config, string $bagName, array $bagConfig)
    {
        if (array_keys($config) != ['path', 'file']) {
            throw new InvalidArgumentException('Driver Json is not configurated properly.');
        }

        parent::__construct($config, $bagName);
    }

    /**
     * Delete given key.
     *
     * @param string $key
     *
     * @return void
     */
    public function delete(string $key) : void
    {
        $this->fireForgetingEvent($key);

        // TODO

        $this->fireForgotEvent($key);
    }

    /**
     * Load Raw data from storage.
     *
     * @return self
     */
    public function fetch() : array
    {
        $this->fireLoadingEvent();

        // TODO

        $this->fireLoadedEvent();

        return [];
    }

    /**
     * Insert new key.
     *
     * @param string $key
     * @param mixed  $value
     * @param string $type
     *
     * @return mixed
     */
    public function insert(string $key, $value, string $type)
    {
        $this->fireRegisteringEvent($key);

        // TODO

        $this->fireRegisteredEvent($key, $value);

        return $value;
    }

    /**
     * Update given key.
     *
     * @param string $key
     * @param mixed  $value
     *
     * @return mixed
     */
    public function update(string $key, $value)
    {
        $this->fireUpdatingEvent($key);

        // TODO

        $this->fireUpdatedEvent($key, $value);

        return $value;
    }
}
