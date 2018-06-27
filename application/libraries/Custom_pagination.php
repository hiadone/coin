<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2015, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package CodeIgniter
 * @author  EllisLab Dev Team
 * @copyright   Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @copyright   Copyright (c) 2014 - 2015, British Columbia Institute of Technology (http://bcit.ca/)
 * @license http://opensource.org/licenses/MIT  MIT License
 * @link    http://codeigniter.com
 * @since   Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Pagination Class
 *
 * @package        CodeIgniter
 * @subpackage  Libraries
 * @category    Pagination
 * @author        EllisLab Dev Team
 * @link        http://codeigniter.com/user_guide/libraries/pagination.html
 */
class Custom_pagination extends CI_Pagination
{

    public $num_links = 5;
    public $cur_page = 1;
    public $use_page_numbers = true;
    public $first_link = '';
    public $next_link = '더보기 ▼';
    public $prev_link = '';
    public $last_link = '';
    public $first_tag_open = '';
    public $first_tag_close = '';
    public $last_tag_open = '';
    public $last_tag_close = '';
    public $cur_tag_open = '';
    public $cur_tag_close = '';
    public $next_tag_open = '<div class="btn_more">';
    public $next_tag_close = '</div>';
    public $prev_tag_open = '';
    public $prev_tag_close = '';
    public $full_tag_open = '';
    public $full_tag_close = '';
    public $num_tag_open = '';
    public $num_tag_close = '';
    public $page_query_string = true;
    public $query_string_segment = 'page';

    public $page_sub=false;

    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();
    }

    public function create_links()
    {


        // If our item count or per-page total is zero there is no need to continue.
        // Note: DO NOT change the operator to === here!
        if ($this->total_rows == 0 OR $this->per_page == 0)
        {
            return '';
        }

        // Calculate the total number of pages
        $num_pages = (int) ceil($this->total_rows / $this->per_page);

        // Is there only one page? Hm... nothing more to do here then.
        if ($num_pages === 1)
        {
            return '';
        }

        // Check the user defined number of links.
        $this->num_links = (int) $this->num_links;

        if ($this->num_links < 0)
        {
            show_error('Your number of links must be a non-negative number.');
        }

        // Keep any existing query string items.
        // Note: Has nothing to do with any other query string option.
        if ($this->reuse_query_string === TRUE)
        {
            $get = $this->CI->input->get();

            // Unset the control, method, old-school routing options
            unset($get['c'], $get['m'], $get[$this->query_string_segment]);
        }
        else
        {
            $get = array();
        }

        // Put together our base and first URLs.
        // Note: DO NOT append to the properties as that would break successive calls
        $base_url = trim($this->base_url);
        $first_url = $this->first_url;

        $query_string = '';
        $query_string_sep = (strpos($base_url, '?') === FALSE) ? '?' : '&amp;';

        // Are we using query strings?
        if ($this->page_query_string === TRUE)
        {
            // If a custom first_url hasn't been specified, we'll create one from
            // the base_url, but without the page item.
            if ($first_url === '')
            {
                $first_url = $base_url;

                // If we saved any GET items earlier, make sure they're appended.
                if ( ! empty($get))
                {
                    $first_url .= $query_string_sep.http_build_query($get);
                }
            }

            // Add the page segment to the end of the query string, where the
            // page number will be appended.
            $base_url .= $query_string_sep.http_build_query(array_merge($get, array($this->query_string_segment => '')));
        }
        else
        {
            // Standard segment mode.
            // Generate our saved query string to append later after the page number.
            if ( ! empty($get))
            {
                $query_string = $query_string_sep.http_build_query($get);
                $this->suffix .= $query_string;
            }

            // Does the base_url have the query string in it?
            // If we're supposed to save it, remove it so we can append it later.
            if ($this->reuse_query_string === TRUE && ($base_query_pos = strpos($base_url, '?')) !== FALSE)
            {
                $base_url = substr($base_url, 0, $base_query_pos);
            }

            if ($first_url === '')
            {
                $first_url = $base_url.$query_string;
            }

            $base_url = rtrim($base_url, '/').'/';
        }

        // Determine the current page number.
        $base_page = ($this->use_page_numbers) ? 1 : 0;

        // Are we using query strings?
        if ($this->page_query_string === TRUE)
        {
            $this->cur_page = $this->CI->input->get($this->query_string_segment);
        }
        elseif (empty($this->cur_page))
        {
            // Default to the last segment number if one hasn't been defined.
            if ($this->uri_segment === 0)
            {
                $this->uri_segment = count($this->CI->uri->segment_array());
            }

            $this->cur_page = $this->CI->uri->segment($this->uri_segment);

            // Remove any specified prefix/suffix from the segment.
            if ($this->prefix !== '' OR $this->suffix !== '')
            {
                $this->cur_page = str_replace(array($this->prefix, $this->suffix), '', $this->cur_page);
            }
        }
        else
        {
            $this->cur_page = (string) $this->cur_page;
        }

        // If something isn't quite right, back to the default base page.
        if ( ! ctype_digit($this->cur_page) OR ($this->use_page_numbers && (int) $this->cur_page === 0))
        {
            $this->cur_page = $base_page;
        }
        else
        {
            // Make sure we're using integers for comparisons later.
            $this->cur_page = (int) $this->cur_page;
        }

        // Is the page number beyond the result range?
        // If so, we show the last page.
        if ($this->use_page_numbers)
        {
            if ($this->cur_page > $num_pages)
            {
                $this->cur_page = $num_pages;
            }
        }
        elseif ($this->cur_page > $this->total_rows)
        {
            $this->cur_page = ($num_pages - 1) * $this->per_page;
        }

        $uri_page_number = $this->cur_page;

        // If we're using offset instead of page numbers, convert it
        // to a page number, so we can generate the surrounding number links.
        if ( ! $this->use_page_numbers)
        {
            $this->cur_page = (int) floor(($this->cur_page/$this->per_page) + 1);
        }

        // Calculate the start and end numbers. These determine
        // which number to start and end the digit links with.
        $start  = (($this->cur_page - $this->num_links) > 0) ? $this->cur_page - ($this->num_links - 1) : 1;
        $end    = (($this->cur_page + $this->num_links) < $num_pages) ? $this->cur_page + $this->num_links : $num_pages;

        // And here we go...
        $output = '';

        // Render the "First" link.
        if ($this->first_link !== FALSE && $this->cur_page > ($this->num_links + 1 + ! $this->num_links))
        {
            // Take the general parameters, and squeeze this pagination-page attr in for JS frameworks.
            $attributes = sprintf('%s %s="%d"', $this->_attributes, $this->data_page_attr, 1);

            $output .= $this->first_tag_open.'<a href="'.$first_url.'"'.$attributes.$this->_attr_rel('start').'>'
                .$this->first_link.'</a>'.$this->first_tag_close;
        }

        // Render the "Previous" link.
        if ($this->prev_link !== FALSE && $this->cur_page !== 1)
        {
            $i = ($this->use_page_numbers) ? $uri_page_number - 1 : $uri_page_number - $this->per_page;

            $attributes = sprintf('%s %s="%d"', $this->_attributes, $this->data_page_attr, ($this->cur_page - 1));

            if ($i === $base_page)
            {
                // First page
                $output .= $this->prev_tag_open.'<a href="'.$first_url.'"'.$attributes.$this->_attr_rel('prev').'>'
                    .$this->prev_link.'</a>'.$this->prev_tag_close;
            }
            else
            {
                $append = $this->prefix.$i.$this->suffix;
                $output .= $this->prev_tag_open.'<a href="'.$base_url.$append.'"'.$attributes.$this->_attr_rel('prev').'>'
                    .$this->prev_link.'</a>'.$this->prev_tag_close;
            }

        }

        // Render the pages
        if ($this->display_pages !== FALSE)
        {
            // Write the digit links
            for ($loop = $start - 1; $loop <= $end; $loop++)
            {
                $i = ($this->use_page_numbers) ? $loop : ($loop * $this->per_page) - $this->per_page;

                $attributes = sprintf('%s %s="%d"', $this->_attributes, $this->data_page_attr, $loop);

                if ($i >= $base_page)
                {
                    if ($this->cur_page === $loop)
                    {
                        // Current page
                        // $output .= $this->cur_tag_open.$loop.$this->cur_tag_close;
                    }
                    elseif ($i === $base_page)
                    {
                        // First page
                        $output .= $this->num_tag_open.''.$this->num_tag_close;
                    }
                    else
                    {
                        $append = $this->prefix.$i.$this->suffix;

                        
                        $output .= $this->num_tag_open.'<div id="pagination'.$loop.'"></div>'.$this->num_tag_close;
                            
                    }
                }
            }
        }

        // Render the "next" link
        if ($this->next_link !== FALSE && $this->cur_page < $num_pages)
        {
            $i = ($this->use_page_numbers) ? $this->cur_page + 1 : $this->cur_page * $this->per_page;

            $attributes = sprintf('%s %s="%d"', $this->_attributes, $this->data_page_attr, $this->cur_page + 1);


            if($this->page_sub)
                $output .= $this->next_tag_open.'<a id="view_pagination_btn_sub"'.$attributes
                .$this->_attr_rel('next').'>'.$this->next_link.'</a>'.$this->next_tag_close;
            else 
                $output .= $this->next_tag_open.'<a id="view_pagination_btn" href="#'.($this->cur_page + 1).'"'.$attributes
                .$this->_attr_rel('next').'>'.$this->next_link.'</a>'.$this->next_tag_close;
         
        }

        // Render the "Last" link
        if ($this->last_link !== FALSE && ($this->cur_page + $this->num_links + ! $this->num_links) < $num_pages)
        {
            $i = ($this->use_page_numbers) ? $num_pages : ($num_pages * $this->per_page) - $this->per_page;

            $attributes = sprintf('%s %s="%d"', $this->_attributes, $this->data_page_attr, $num_pages);

            $output .= $this->last_tag_open.'<a href="'.$base_url.$this->prefix.$i.$this->suffix.'"'.$attributes.'>'
                .$this->last_link.'</a>'.$this->last_tag_close;
        }

        // Kill double slashes. Note: Sometimes we can end up with a double slash
        // in the penultimate link so we'll kill all double slashes.
        $output = preg_replace('#([^:"])//+#', '\\1/', $output);

        // Add the wrapper HTML if exists
        return $this->full_tag_open.$output.$this->full_tag_close;
    
    }
}
