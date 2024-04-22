<?php
class comment{
    private  $id = null;
    private  $blogid = null;
    private  $firstname = null;
    private  $lastname = null;
    private  $gender = null;
    private  $email = null;
    private  $phonenumber = null;
    private  $message = null;
    private  $ip = null;
    private  $seen = null;
    public function __construct($id=null,$a,$b,$c,$d,$e,$f,$g,$h,$i)
    {
        $this->id=$id;
        $this->blogid=$a;
        $this->firstname=$b;
        $this->lastname=$c;
        $this->gender=$d;
        $this->email=$e;
        $this->phonenumber=$f;
        $this->message=$g;
        $this->ip=$h;
        $this->seen=$i;
    }
    /**
     * Get the value of id
     */
    public function getiditem()
    {
        return $this->id;
    }
    /**
     * Get the value of blogid
     */
    public function getblogid()
    {
        return $this->blogid;
    }
    /**
     * Set the value of blogid
     *
     * @return  self
     */
    public function setblogid($blogid)
    {
        $this->blogid = $blogid;

        return $this;
    }	
    /**
     * Get the value of firstname
     */
    public function getfirstname()
    {
        return $this->firstname;
    }
    /**
     * Set the value of firstname
     *
     * @return  self
     */
    public function setfirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }
    /**
     * Get the value of lastname
     */
    public function getlastname()
    {
        return $this->lastname;
    }
    /**
     * Set the value of lastname
     *
     * @return  self
     */
    public function setlastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }
    /**
     * Get the value of gender
     */
    public function getgender()
    {
        return $this->gender;
    }
    /**
     * Set the value of gender
     *
     * @return  self
     */
    public function setgender($gender)
    {
        $this->gender = $gender;
        return $this;
    }		
    /**
     * Get the value of email
     */
    public function getemail()
    {
        return $this->email;
    }
    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setemail($email)
    {
        $this->email = $email;
        return $this;
    }
    /**
     * Get the value of email
     */
    public function getphonenumber()
    {
        return $this->phonenumber;
    }
    /**
     * Set the value of phonenumber
     *
     * @return  self
     */
    public function setphonenumber($phonenumber)
    {
        $this->phonenumber = $phonenumber;
        return $this;
    }       
    /**
     * Get the value of message
     */
    public function getmessage()
    {
        return $this->message;
    }
    /**
     * Set the value of message
     *
     * @return  self
     */
    public function setmessage($message)
    {
        $this->message = $message;
        return $this;
    }       
    /**
     * Get the value of ip
     */
    public function getip()
    {
        return $this->ip;
    }
    /**
     * Set the value of ip
     *
     * @return  self
     */
    public function setip($ip)
    {
        $this->ip = $ip;
        return $this;
    }       
    /**
     * Get the value of email
     */
    public function getseen()
    {
        return $this->seen;
    }
    /**
     * Set the value of seen
     *
     * @return  self
     */
    public function setseen($seen)
    {
        $this->seen = $seen;
        return $this;
    }   
}
class newblog{
    private  $id = null;
    private  $title = null;
    private  $img = null;
    private  $description = null;
    private  $fulltxt = null;
    private  $datep = null;
    public function __construct($id=null,$a,$b,$c,$d,$e)
    {
        $this->id=$id;
        $this->title=$a;
        $this->img=$b;
        $this->description=$c;
        $this->fulltxt=$d;
        $this->datep=$e;
    }
    /**
     * Get the value of id
     */
    public function getidipost()
    {
        return $this->id;
    }
    /**
     * Get the value of title
     */
    public function gettitle()
    {
        return $this->title;
    }
    /**
     * Set the value of title
     *
     * @return  self
     */
    public function settitle($title)
    {
        $this->title = $title;
        return $this;
    }
    /**
     * Get the value of img
     */
    public function getimg()
    {
        return $this->img;
    }
    /**
     * Set the value of img
     *
     * @return  self
     */
    public function setimg($img)
    {
        $this->img = $img;
        return $this;
    }
    /**
     * Get the value of description
     */
    public function getdescription()
    {
        return $this->description;
    }
    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setgender($description)
    {
        $this->description = $description;
        return $this;
    }       
    /**
     * Get the value of fulltxt
     */
    public function getfulltxt()
    {
        return $this->fulltxt;
    }
    /**
     * Set the value of fulltxt
     *
     * @return  self
     */
    public function setemail($fulltxt)
    {
        $this->fulltxt = $fulltxt;
        return $this;
    }
    /**
     * Get the value of email
     */
    public function getdatep()
    {
        return $this->datep;
    }
    /**
     * Set the value of datep
     *
     * @return  self
     */
    public function setdatep($datep)
    {
        $this->datep = $datep;
        return $this;
    }
}

