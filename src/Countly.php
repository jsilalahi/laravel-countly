<?php

namespace DynEd\Countly;

use Illuminate\Support\Arr;

class Countly {
    /** @var string */
    protected $enabled;

    /** @var string */
    protected $appKey;

    /** @var string */
    protected $host;

    /** @var array */
    protected $features;

    /** @var string */
    protected $script;

    /**
     * Countly constructor
     *
     * @param array $options
     */
    public function __construct(array $options)
    {
        $this->enabled = Arr::get($options, 'enabled');
        $this->appKey = Arr::get($options, 'app_key');
        $this->host = Arr::get($options, 'host');
        $this->features = Arr::get($options, 'features');
        $scripts = Arr::get($options, 'script_src');
        $this->script = $scripts[Arr::get($options, 'script')];
    }

    /**
     * Disable Countly on the fly
     *
     * @return $this
     */
    public function disable()
    {
        $this->enabled = false;

        return $this;
    }

    /**
     * Enable Countly on the fly
     *
     * @return $this
     */
    public function enable()
    {
        $this->enabled = true;

        return $this;
    }

    /**
     * Render snippet script
     *
     * @return string
     */
    public function renderSnippetScript()
    {
        return (new ScriptSnippet())
            ->init()
            ->appKey($this->appKey)
            ->url($this->host)
            ->features($this->features)
            ->script($this->script)
            ->wrap()
            ->render();
    }
}