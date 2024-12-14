<?php

namespace App\Classes;

class User
{
    private string $cover_image;
    private string $main_title;
    private string $subtitle;
    private string $about_you;
    private int $phone;
    private string $location;
    private string $service_type;
    private string $linkedin_link;
    private string $facebook_link;
    private string $twitter_link;
    private string $google_link;

    public function __construct(string $cover_image, string $main_title, string $subtitle, string $about_you, int $phone, string $location, string $service_type, string $linkedin_link, string $facebook_link, string $twitter_link, string $google_link)
    {
        $this->setCoverImage($cover_image);
        $this->setMainTitle($main_title);
        $this->setSubtitle($subtitle);
        $this->setAboutYou($about_you);
        $this->setPhone($phone);
        $this->setLocation($location);
        $this->setServiceType($service_type);
        $this->setLinkedinLink($linkedin_link);
        $this->setFacebookLink($facebook_link);
        $this->setTwitterLink($twitter_link);
        $this->setGoogleLink($google_link);

    }

    public function getCoverImage(): string
    {
        return $this->cover_image;
    }

    public function setCoverImage(string $cover_image): self
    {
        $this->cover_image = $cover_image;
        return $this;
    }

    public function getMainTitle(): string
    {
        return $this->main_title;
    }

    public function setMainTitle(string $main_title): self
    {
        $this->main_title = $main_title;
        return $this;
    }

    public function getSubtitle(): string
    {
        return $this->subtitle;
    }

    public function setSubtitle(string $subtitle): self
    {
        $this->subtitle = $subtitle;
        return $this;
    }

    public function getAboutYou(): string
    {
        return $this->about_you;
    }

    public function setAboutYou(string $about_you): self
    {
        $this->about_you = $about_you;
        return $this;
    }

    public function getPhone(): int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): self
    {
        $this->phone = $phone;
        return $this;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;
        return $this;
    }

    public function getServiceType(): string
    {
        return $this->service_type;
    }

    public function setServiceType(string $service_type): self
    {
        $this->service_type = Validator::validateServiceType($service_type);
        return $this;
    }

    public function getLinkedinLink(): string
    {
        return $this->linkedin_link;
    }

    public function setLinkedinLink(string $linkedin_link): self
    {
        $this->linkedin_link = $linkedin_link;
        return $this;
    }

    public function getFacebookLink(): string
    {
        return $this->facebook_link;
    }

    public function setFacebookLink(string $facebook_link): self
    {
        $this->facebook_link = $facebook_link;
        return $this;
    }

    public function getTwitterLink(): string
    {
        return $this->twitter_link;
    }

    public function setTwitterLink(string $twitter_link): self
    {
        $this->twitter_link = $twitter_link;
        return $this;
    }

    public function getGoogleLink(): string
    {
        return $this->google_link;
    }

    public function setGoogleLink(string $google_link): self
    {
        $this->google_link = $google_link;
        return $this;
    }
}
