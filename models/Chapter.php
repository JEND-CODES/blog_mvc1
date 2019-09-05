<?php
class Chapter
{
    
    private $_id;
    private $_title;
    private $_content;
    private $_chapi;
    private $_alarm;
    private $_zerolink;
    private $_chapterDate;
    private $_refreshDate;
    
   
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }
    
    
    public function hydrate(array $data)
    {
        foreach($data as $key => $value)
           
        {
           
            $method = 'set'.ucfirst($key);
            
           
            if(method_exists($this, $method))
                $this->$method($value);
        }
    }
    
    
    public function id()
    {
        return $this->_id;    
    }
    public function title()
    {
        return $this->_title;    
    }
    public function content()
    {
        return $this->_content;    
    }
    public function chapi()
    {
        return $this->_chapi;    
    }
    public function alarm()
    {
        return $this->_alarm;    
    }
    public function zerolink()
    {
        return $this->_zerolink;    
    }
    public function chapterDate()
    {
        return $this->_chapterDate;
    } 
    public function refreshDate()
    {
        return $this->_refreshDate;
    } 
    
  
    public function setId($id)
    {
        $id = (int) $id;
        
        if($id > 0)
            $this->_id = $id;
    }
    
    public function setTitle($title)
    {
        if(is_string($title))
            
            
            $this->_title = $title;
    }
    public function setContent($content)
    {
        if(is_string($content))
            $this->_content = $content;
    }
       public function setChapi($chapi)
    {
        if(is_string($chapi))
            $this->_chapi = $chapi;
    }
    public function setAlarm($alarm)
    {
        $alarm = (int) $alarm;
        
        if($alarm >= 0)
            $this->_alarm = $alarm;
    }
    public function setZerolink($zerolink)
    {
        if(is_string($zerolink))
            
            $this->_zerolink = $zerolink;
    }
    public function setChapterDate($chapterDate)
    {
        $this->_chapterDate = $chapterDate;
    }
    public function setRefreshDate($refreshDate)
    {
        $this->_refreshDate = $refreshDate;
    }
}