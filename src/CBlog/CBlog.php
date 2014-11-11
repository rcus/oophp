<?php
/**
 * Blogcontent wrapper, provides a content API for the framework.
 *
 */
class CBlog extends CContent
{

    /**
     * Members
     */
    private $blogSlug = null;


    /**
     * Constructor creating a PDO object connecting to a choosen database.
     *
     * @param array $options containing details for connecting to the database.
     *
     */
    public function __construct($options) {
        parent::__construct($options);
        $this->blogSlug = isset($_GET['slug']) ? $_GET['slug'] : $this->blogSlug;
    }


}