<?php
/**
 * Content wrapper, provides a content API for the framework.
 *
 */
class CContent extends CDatabase
{

    /**
     * Members
     */
    public $filter;
    private $content;
    //private $pageUrl = null;
    //private $blogSlug = null;


    /**
     * Constructor creating a PDO object connecting to a choosen database.
     *
     * @param array $options containing details for connecting to the database.
     *
     */
    public function __construct($options) {
        $this->filter = new CTextFilter();
        parent::__construct($options);
    }


    /**
     * Get the content of the page.
     *
     * @param object $content to link to.
     * @return string with url to display content.
     */
    public function GetContent($type, $param) {
        $sql = "SELECT * FROM Content WHERE type = ?";
        if ($type == 'page') {
            $sql .= " AND url = ?";
        }
        $sql .= " AND published <= NOW();";
        return $this->ExecuteSelectQueryAndFetchAll($sql, array($type, $param));
    }


    /**
     * Create a link to the content, based on its type.
     *
     * @param object $content to link to.
     * @return string with url to display content.
     */
    public function getUrlToContent($content) {
      switch($content->type) {
        case 'page': return "page.php?url={$content->url}"; break;
        case 'post': return "blog.php?slug={$content->slug}"; break;
        default: return null; break;
      }
    }


    public function GetTitle()
    {
        // Sanitize content before using it.
        $title = htmlentities($content->title, null, 'UTF-8');

        return null;
    }


    public function GetBody()
    {
        // Sanitize content before using it.
        $data = CTextFilter::doFilter(htmlentities($content->data, null, 'UTF-8'), $content->filter);

        return null;
    }

    /**
     * Call each filter.
     *
     * @param string $text the text to filter.
     * @param string $filter as comma separated list of filter.
     * @return string the formatted text.
     */
/*    public function DoFilter($text, $filter) {
        // Define all valid filters with their callback function.
        $valid = array(
            'bbcode'   => 'bbcode2html',
            'link'     => 'make_clickable',
            'markdown' => 'markdown',
            'nl2br'    => 'nl2br',  
        );

        // Make an array of the comma separated string $filter
        $filters = preg_replace('/\s/', '', explode(',', $filter));

        // For each filter, call its function with the $text as parameter.
        foreach($filters as $func) {
            if(isset($valid[$func])) {
                $text = $valid[$func]($text);
            } 
            else {
                throw new Exception("The filter '$filter' is not a valid filter string.");
            }
        }

        return $text;
    }
*/
}