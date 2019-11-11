<?php
/**
 * Created by PhpStorm.
 * User: dimon
 * Date: 19.09.2019
 * Time: 0:32
 */

namespace Service\SocialNet;


interface SocialNetInterface
{
  public const SOCIAL_NET = array(
    "VK" => 'Vk',
    "Face" => 'Facebook',
    "OK" => 'Ok',
    "Insta" => 'Instagram',
  );

  public function send(
    string $id,
    string $img,
    string $path
  ): void;

}