<?php
namespace OpenBackup\Wrapper;
/**
 * Manages options using the WordPress options API.
 */
class AdminOptions
{
    /**
     * Gets the option for the given name. Returns the default value if 
     * the value does not exist.
     *
     * @param string $name
     * @param mixed  $default
     *
     * @return mixed
     */
    public function get($name, $default = null)
    {
        return get_option($name, $default);
    }

    /**
     * Checks if the option with the given name exists or not.
     *
     * @param string $name
     *
     * @return bool
     */
    public function has($name)
    {
        return null !== $this->get($name);
    }

    /**
     * Removes the option with the given name.
     *
     * @param string $name
     */
    public function remove($name)
    {
        delete_option($name);
    }

    /**
     * Sets an option. Overwrites the existing option if the name is 
     * already in use.
     *
     * @param string $name
     * @param mixed  $value
     */
    public function set($name, $value)
    {
        update_option($name, $value);
    }
}