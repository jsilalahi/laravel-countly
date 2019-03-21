<?php

namespace DynEd\Countly;

class ScriptSnippet {

    /** @var array */
    protected $scripts = [];

    /**
     * Init
     *
     * @return $this
     */
    public function init()
    {
        $this->scripts[] = "var Countly = Countly || {};";
        $this->scripts[] = "Countly.q = Countly.q || [];";

        return $this;
    }

    /**
     * Set app key
     *
     * @param $appKey
     * @return $this
     */
    public function appKey($appKey)
    {
        $this->scripts[] = "Countly.app_key = '{$appKey}';";

        return $this;
    }

    /**
     * Set host URL
     *
     * @param $url
     * @return $this
     */
    public function url($url)
    {
        $this->scripts[] = "Countly.url = '{$url}';";

        return $this;
    }

    /**
     * Set features
     *
     * @param array $features
     * @return $this
     */
    public function features(array $features)
    {
        foreach ($features as $key => $value)
        {
            if($value) {
                $this->scripts[] = "Countly.q.push(['{$key}']);";
            }
        }

        return $this;
    }

    /**
     * Set scripts
     *
     * @param $script
     * @return $this
     */
    public function script($script)
    {
        $this->scripts[] = "(function() {";
        $this->scripts[] = "let cly = document.createElement('script'); cly.type = 'text/javascript';";
        $this->scripts[] = "cly.async = true;";
        $this->scripts[] = "cly.src = '{$script}';";
        $this->scripts[] = "cly.onload = function(){Countly.init()};";
        $this->scripts[] = "let s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(cly, s);";
        $this->scripts[] = "})();";

        return $this;
    }

    /**
     * Wrap script into javascript tag
     *
     * @return $this
     */
    public function wrap()
    {
        $this->scripts = ["<script type='text/javascript'>"] + $this->scripts + ["</script>"];

        return $this;
    }

    /**
     * Render into javascript snippet code to embed
     *
     * @return string
     */
    public function render()
    {
        return implode("", $this->scripts);
    }

}