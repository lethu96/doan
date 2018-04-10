<script>
    $(document).ready(function() {
        setInterval(function(){
            console.log('a');
         }, 3000);
    });
</script>
<?php

    $title = 'お問い合わせ';

    $to = 'sales@ishikawashoji.dev';

    $labels = array(
        'user_name' => 'お名前',
        'user_furigana' => 'ふりがな',
        'user_mail' => 'メールアドレス',
        'user_tel' => '電話番号',
        'user_org' => 'ご勤務先',
        'user_family' => 'ご家族',
        'user_budget_min' => 'ご予算',
        'user_budget_max' => '',
        'room_type' => '間取り',
        'area' => 'エリア',
        'period' => 'ご入居時期',
        'contract_type' => 'ご契約者名義',
        'interesting' => '空室の有無を知りたい物件',
        'notes' => 'その他',
    );

    $rooms = array('Studio');

    for ($i = 1; $i < 5; ++$i) {
        $rooms[] = sprintf('%1$dBedroom (%1$dLDK)', $i);
    }

    $room_type = $rooms;

    $areas = array(
        'BTSアソーク駅～エカマイ駅 北側',
        'BTSアソーク駅～エカマイ駅 南側',
        'BTSナナ駅～アソーク駅',
        'プルンチット地区',
        'シーロム/サトーン地区',
        'その他の地区',
    );

    $subject_type = array(
        '未入力' => '選択してください',
        '不明' => '不明／不定',
        '個人' => '個人名義で契約',
        '法人' => '法人名義で契約',
    );

    $families = array('未入力' => '選択してください');

    foreach (array('ご単身', 'ご夫婦', 'お子様連れx1人', 'お子様連れx2人', 'お子様連れx3人') as $family) {
        $families[$family] = $family;
    }

    $families = $families;
?>
<div class="col-xs-24" id="content_pro_service" xmlns="http://www.w3.org/1999/html">
    <div class="row">
        <div class="col-xs-24 icon_img">
            <object type="image/svg+xml" data="/assets/img/icon.svg">ブラウザがSVGファイルに対応していません。</object>
            <h1>物件詳細</h1>
        </div>
        <div class="col-xs-24 col-sm-22 col-sm-offset-1 title_cate_pc fa fa-home bread">
            <a class="title_link" href="/">石川商事トップ</a> <span class="angle-right">></span>
            <a class="title_link" href=" <?php echo $linkarea; ?>"> <?php echo $namearea; ?></a>
            <p class="fa fa-angle-right">  <?php h($estate->name_en) ?></p>
        </div>
        <!--
        <div class="col-xs-24 col-sm-22 col-sm-offset-1 title_cate_mb bread">
            <div class="col-xs-2 fa fa-home"></div>
            <div class="col-xs-22">
                <a class="title_link" href="/">石川商事トップ</a>
                <p class="fa fa-angle-right"></p>
                <a class="title_link2" href="#">BTSアソーク駅 〜 エカマイ駅（北側）</a>
                <p class="fa fa-angle-right">  <?php h($estate->name_en) ?></p>
            </div>
        </div>-->
        <div class="col-sm-16 col-sm-offset-1 col-xs-24 nav_left">
            <div class="info_product_PC col-xs-24" id="frame">
                <div class="col-xs-24"></div>
                <div class=" col-xs-24 title_product estate-title">
                    <?php h($estate->name_en) ?>
                    <div>
                        <?php if (!empty($estate->name)) : ?>
                            <?php h($estate->name) ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-xs-24 fix-pd">
                    <div class="col-xs-3 color-discripton <?php
                    if ($estate->estate_type == 'コンドミニアム') {
                        echo 'green_color';
                    }
                    if ($estate->estate_type == 'サービスアパートメント') {
                        echo 'yellow_color';
                    }
                    ?>">
                        <?php h($estate->estate_type == 'サービスアパートメント' ? 'サービスアパート' : $estate->estate_type) ?>
                    </div>
                </div>
                <div class="col-xs-24 desc_text">
                    <?php
                    labels($estate, $metas[$estate->ID], $facilities[$estate->ID]) ?>
                </div>
            </div>
            <div class="info_product_mb col-xs-24" id="frame">
                <div class="col-xs-24 bg-white">
                    <div class="col-xs-24"></div>
                    <div class=" col-xs-24 title_product"><?php h($estate->name_en) ?></div>
                    <div class="col-xs-24 title_pro_mb">
                        <?php if (!empty($estate->name)) : ?>
                            <?php h($estate->name) ?>
                        <?php endif; ?>
                    </div>
                    <div class="col-xs-24 fix-pd">
                        <div class="col-xs-3 color-discripton <?php
                        if ($estate->estate_type == 'コンドミニアム') {
                            echo 'green_color';
                        }
                        if ($estate->estate_type == 'サービスアパートメント') {
                            echo 'yellow_color';
                        }
                        ?>"><?php h($estate->estate_type == 'サービスアパートメント' ? 'サービスアパート' : $estate->estate_type) ?></div>
                    </div>
                    <div class="col-xs-24 desc_text">
                        <?php labels($estate, $metas[$estate->ID], $facilities[$estate->ID]) ?>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="container col-xs-24">
                <div class="row">
                    <ul class="nav nav-tabs">
                        <li class="active ">
                            <a data-toggle="tab" href="#home" class="fa fa-caret-right"><i>物件概要</i></a>
                        </li>
                        <li>
                            <a id="showImageGallery" data-toggle="tab" href="#menu1" class="fa fa-caret-right"><i>ギャラリー</i></a>
                        </li>
                        <?php
                            $list_videos = array();
                            if (isset($metas[$estate->ID]['room_room_id']) && !empty($metas[$estate->ID]['room_room_id']->name)) {
                                array_push($list_videos, $metas[$estate->ID]['room_room_id']);
                            }
                            if (isset($metas[$estate->ID]['room_room_id_2']) && !empty($metas[$estate->ID]['room_room_id_2']->name)) {
                                array_push($list_videos, $metas[$estate->ID]['room_room_id_2']);
                            }
                            if (isset($metas[$estate->ID]['room_room_id_3']) && !empty($metas[$estate->ID]['room_room_id_3']->name)) {
                                array_push($list_videos, $metas[$estate->ID]['room_room_id_3']);
                            }
                            if (isset($metas[$estate->ID]['room_room_id_4']) && !empty($metas[$estate->ID]['room_room_id_4']->name)) {
                                array_push($list_videos, $metas[$estate->ID]['room_room_id_4']);
                            }
                            if (isset($metas[$estate->ID]['room_room_id_5']) && !empty($metas[$estate->ID]['room_room_id_5']->name)) {
                                array_push($list_videos, $metas[$estate->ID]['room_room_id_5']);
                            }
                        ?>

                        <?php if (count($list_videos) > 0) : ?>
                            <li><a data-toggle="tab" href="#menu2" class="fa fa-caret-right"><i>動 画</i></a></li>
                        <?php endif; ?>
                    </ul>
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <div class="col-xs-24 info_pc">
                                <div class="row">
                                    <div class="col-lg-5 nav-left col-xs-11 col-sm-8">
                                        <img id="swap" alt="<?php h($eyecatch[$estate->ID]['alt']) ?>"
                                             src="<?php echo $eyecatch[$estate->ID]['url'] ?>" />
                                    </div>
                                    <div class="col-lg-19 nav-right col-sm-16">
                                        <table class="table table-responsive">
                                            <tr class="table-estate">
                                                <th class="fix-br col-md-7 col-xs-11">立　地</th>
                                                <td>
                                                    <?php h_if($estate->location_en.' '.$estate->soy_no_en, '---') ?>
                                                </td>
                                            </tr>
                                            <tr class="table-estate">
                                                <th>最寄駅</th>
                                                <td>
                                                    <span class="station-inline">BTS</span>
                                                    <?php if (!empty($bts) && !empty($metas[$estate->ID]['bts_minutes']->name)) : ?>
                                                        <span>
                                                            <?= $bts->name.' ('.$metas[$estate->ID]['bts_minutes']->name.'分)'; ?>
                                                        </span>
                                                    <?php elseif (!empty($bts) && empty($metas[$estate->ID]['bts_minutes']->name)) : ?>
                                                        <span>
                                                            <?= $bts->name.' (10分以上)'; ?>
                                                        </span>
                                                    <?php else : ?>
                                                        ---
                                                    <?php endif; ?>
                                                    <br><span class="station-inline">MRT</span>
                                                    <?php if (!empty($mrt) && !empty($metas[$estate->ID]['mrt_minutes']->name)) : ?>
                                                        <span>
                                                            <?= $mrt->name.' ('.$metas[$estate->ID]['mrt_minutes']->name.'分)'; ?>
                                                        </span>
                                                    <?php elseif (!empty($mrt) && empty($metas[$estate->ID]['mrt_minutes']->name)) : ?>
                                                         <span>
                                                            <?= $mrt->name.' (10分以上)'; ?>
                                                        </span>   
                                                    <?php else : ?> 
                                                        ---
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <tr class="table-estate">
                                                <th>築年（改築年）</th>
                                                <td>
                                                    <?php if (isset($metas[$estate->ID]['build'])
                                                        && !empty($metas[$estate->ID]['build']->name)) : ?>
                                                    <?php echo $metas[$estate->ID]['build']->name ?>
                                                    <?php else : ?>
                                                        ---
                                                    <?php endif; ?>
                                                    （
                                                    <?php if (isset($metas[$estate->ID]['renovated'])
                                                        && !empty($metas[$estate->ID]['renovated']->name)) : ?>
                                                    <?php echo $metas[$estate->ID]['renovated']->name ?>
                                                    <?php else : ?>
                                                        ---
                                                    <?php endif; ?>
                                                    ）
                                                </td>
                                            </tr>
                                            <tr class="table-estate">
                                                <th>総階数</th>
                                                <td>
                                                    <?php if (isset($metas[$estate->ID]['stairs'])
                                                        && !empty($metas[$estate->ID]['stairs']->name)) : ?>
                                                        <?php echo $metas[$estate->ID]['stairs']->name ?>
                                                    <?php else : ?>
                                                        ---
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                             <tr class="table-estate">
                                                <th>総戸数</th>
                                                <td>
                                                    <?php if (isset($metas[$estate->ID]['rooms'])
                                                        && !empty($metas[$estate->ID]['rooms']->name)) : ?>
                                                        <?php echo $metas[$estate->ID]['rooms']->name ?>
                                                    <?php else : ?>
                                                        ---
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <tr class="table-estate">
                                                <th class="fix-br1">ファシリティ</th>
                                                <td>
                                                    <?php
                                                    if (!empty($facilities[$estate->ID])) : $counter = 0;
                                                        foreach ($facilities[$estate->ID] as $facility) :
                                                            if ($counter && $facility->name_en !== 'etc.') {
                                                                echo '、';
                                                            }
                                                            h($facility->name);
                                                            ++$counter; ?>
                                                        <?php endforeach; ?>
                                                    <?php else : ?>
                                                        ---
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr class="table-estate">
                                                        <th class="fix-br2" style="width: 25%">間取り</th>
                                                        <th class="fix-br2" style="width: 25%">面積（m<sup>2</sup>）</th>
                                                        <th class="fix-br3" style="width: 50%">賃料（Baht)</th>
                                                    </tr>
                                                </thead>
                                                <?php foreach (getListRoomDisplayOnDetail($room_types[$estate->ID]) as $type) : ?>
                                                    <tbody>
                                                        <tr class="table-estate">
                                                        <td> <?php h($type->name) ?></td>
                                                            <td>
                                                                <?php
                                                                    h($type->minSqm);
                                                                    if (!empty($type->maxSqm)) {
                                                                        echo '〜';
                                                                        h($type->maxSqm);
                                                                    }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php
                                                                    echo number_format($type->minRent);
                                                                    echo '〜';
                                                                    if (!empty($type->maxRent)) {
                                                                        echo number_format($type->maxRent);
                                                                    }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                <?php endforeach; ?>
                                            </table>
                                        </div>
                                        <div class="content_desc">
                                            <p class="rent-notice">
                                                ＊上記の床面積はおおよその数値であることをご了承ください。
                                                <br /> ＊上記の賃料は予告なしに変更になることがございます。
                                            </p>
                                        </div>
                                        <div>
                                            <p class="rent-notice">
                                                <?php echo $metas[$estate->ID]['rent_comment']->name; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="pictures">
                                        <?php
                                        $photos = array();
                                        foreach ($room_thumbs as $thumbnail) {
                                            if (!isset($photos[$thumbnail['large']['room_type_id']])) {
                                                $photos[$thumbnail['large']['room_type_id']] = array();
                                            }
                                            $photos[$thumbnail['large']['room_type_id']][] = $thumbnail['large'];
                                        }
                                        $counter = 0;
                                        $max_image_show = 4;
                                        $pictureCount = 0;
                                        foreach ($photos as $pictures) :
                                            $pictureCount += count($pictures);
                                        endforeach;
                                        foreach ($photos as $room_type_id => $pictures) : ?>
                                            <div class="pict-wrap">
                                            <?php   foreach ($pictures as $picture) : ?>
                                                <?php   if ($counter < $max_image_show) : ?>
                                                            <?php 
                                                            if ($counter % 2 === 0) : ?>
                                                                <div class="clearfix-image">
                                                            <?php 
                                                            endif; ?>
                                                            <div class="pict-box col-lg-6 col-sm-6 col-xs-12">
                                                                <img src="<?php h($picture['url']) ?>"
                                                                     alt="<?php h($picture['alt']) ?>" />
                                                            </div>
                                                            <?php 
                                                            if ($pictureCount >= 4 && $counter % 2 === 1) : ?>
                                                                </div>
                                                            <?php
                                                            endif;
                                                            if ($pictureCount < 4 && ($counter % 2 === 1 || $counter === count($pictures) - 1 
                                                                || $counter === $max_image_show - 1)) : ?>
                                                                </div>
                                                            <?php 
                                                            endif;
                                                            $counter++;
                                                        endif; ?>
                                            <?php   endforeach; ?>
                                            </div>
                                            <?php
                                        endforeach; ?>
                                        <div class="clearfix" style="float: right; clear: both; margin: 2px 0 12px 0;">
                                            <a href="javascript:void(0);" style="color: blue; font-size: 14px; " onclick="showImageTab();">写真をもっと見る</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-24 info_mb">
                                <div class="row">
                                    <div class="col-xs-12 nav-left">
                                        <img id="swap" alt="<?php h($eyecatch[$estate->ID]['alt']) ?>"
                                             src="<?php echo $eyecatch[$estate->ID]['url'] ?>" />
                                    </div>
                                    <div class="col-xs-24 nav-right ">
                                        <table class="table table-responsive table-bordered col-xs-24">
                                            <tr>
                                                <th class="fix-br">立　地</th>
                                                <td>
                                                    <?php h_if($estate->location_en.' '.$estate->soy_no_en, '---') ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>築年（改築年）</th>
                                                <td>
                                                    <?php if (isset($metas[$estate->ID]['build'])
                                                        && !empty($metas[$estate->ID]['build']->name)) : ?>
                                                        <?php echo $metas[$estate->ID]['build']->name ?>
                                                    <?php else : ?>
                                                        ---
                                                    <?php endif; ?>
                                                    （
                                                    <?php if (isset($metas[$estate->ID]['renovated'])
                                                        && !empty($metas[$estate->ID]['renovated']->name)) : ?>
                                                        <?php echo $metas[$estate->ID]['renovated']->name ?>
                                                    <?php else : ?>
                                                        ---
                                                    <?php endif; ?>
                                                    ）
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>総階数</th>
                                                <td><?php if (isset($metas[$estate->ID]['stairs'])
                                                        && !empty($metas[$estate->ID]['stairs']->name)) : ?>
                                                        <?php echo $metas[$estate->ID]['stairs']->name ?>
                                                    <?php else : ?>
                                                        ---
                                                    <?php endif; ?></td>
                                            </tr>
                                            <tr>
                                                <th>総戸数</th>
                                                <td>
                                                    <?php if (isset($metas[$estate->ID]['rooms'])
                                                        && !empty($metas[$estate->ID]['rooms']->name)) : ?>
                                                        <?php echo $metas[$estate->ID]['rooms']->name ?>
                                                    <?php else : ?>
                                                        ---
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="fix-br1">ファシリティ</th>
                                                <td>
                                                    <?php if (!empty($facilities[$estate->ID])) : $counter = 0;
                                                        foreach ($facilities[$estate->ID] as $facility) :
                                                            if ($counter) {
                                                                echo '、';
                                                            }
                                                            h($facility->name);
                                                            ++$counter;
                                                        endforeach; ?>
                                                    <?php else : ?>
                                                        ---
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        </table>
                                        <table class="table table-responsive table-bordered col-xs-24">
                                            <tr>
                                                <th class="col-xs-4 fix-br2">間取り</th>
                                                <th class="col-xs-4 fix-br2">面積（m2）</th>
                                            </tr>
                                            <?php foreach ($room_types[$estate->ID] as $type) : ?>
                                            <tr>
                                                <td> <?php h($type->name_en) ?></td>
                                                <td> <?php h($type->sqm) ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </table>
                                        <div class="content_desc">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-xs-24">
                                <label class=" col-xs-24 col-md-5 map">地　図</label>
                                <div class="col-xs-24 col-md-19 col-xs-offset-1 col-xs-22 map">

                                <div id="map" class="tab-content">
                                    <div id="map-wrap" data-center="<?php echo $estate->latlng ?>">
                                    </div><!-- #map-wrap -->
                                    <h3 class="section-title" style="height: 0px;"></h3>
                                    <div id="street-view-wrap"  style="height: 0px;"></div><!-- #street-view-wrap -->



                                </div><!-- //#map -->

                                </div>
                            </div>
                            <?php if (!empty($metas[$estate->ID]['comment']->name)) : ?>
                                <div class="desc_property_pc col-xs-24">
                                    <label class=" col-xs-5">コメント</label>
                                    <div class="col-xs-19">
                                        <table class="table table-responsive borderless">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <div class="estate-comment-line-height">
                                                        <?php
                                                            $text = $metas[$estate->ID]['comment']->name;
                                                            $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
                                                            preg_match_all($reg_exUrl, $text, $matches);
                                                            $usedPatterns = array();
                                                            foreach($matches[0] as $pattern){
                                                               if(!array_key_exists($pattern, $usedPatterns)){
                                                                   $usedPatterns[$pattern]=true;
                                                                   $text = str_replace ($pattern, "<a href='{$pattern}' style='color:#47C05A' target='_blank'>{$pattern}</a>", $text);   
                                                                }
                                                            }
                                                            echo nl2br($text);
                                                         ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="desc_property_mb col-xs-24">
                                    <label class=" col-xs-24">コメント</label>
                                    <div class="col-xs-24">
                                        <table>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <div class="estate-comment-line-height">
                                                        <?php
                                                            $matches;
                                                            $linkComment = $metas[$estate->ID]['comment']->name;
                                                            $regExUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
                                                            preg_match_all($regExUrl, $text, $matches);
                                                            $usedPatterns = array();
                                                            if (!empty($matches)) {
                                                                foreach($matches[0] as $pattern){
                                                                    if(!array_key_exists($pattern, $usedPatterns)){
                                                                        $usedPatterns[$pattern] = true;
                                                                        $linkComment = str_replace ($pattern, "<a href='{$pattern}' style='color:#47C05A' target='_blank'>{$pattern}</a>", $linkComment);
                                                                    }
                                                                }
                                                            }
                                                            echo nl2br($text);
                                                        ?>
                                                    </div>
                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <?php
                            $options = array(
                                 'サービス情報' => array(
                                    'メイドサービス' => 'maid_service',
                                    'リネン類の交換' => 'linen_change',
                                    'ランドリーサービス' => 'laundry_service',
                               ),
                                '公共料金' => array(
                                    'インターネット' => 'internet',
                                    '電気代' => 'electric',
                                    '水道代' => 'water',
                                    'ケーブルTV' => 'tv',
                                    '日本のテレビ放送' => 'tv_jp',
                               ),
                                '室内付帯設備' => array(
                                    'AV機器' => 'audio',
                                    '洗濯機' => 'washing_machine',
                                    '乾燥機' => 'drying_machine',
                               ),
                                'バスルーム' => array(
                                    'バスタブ' => 'bathtub',
                                    'ウォッシュレット' => 'washlet',
                               ),

                                'その他' => array(
                                    'バルコニー' => 'balcony',
                                    '窓' => 'window',
                               ),
                                '契約' => array(
                                    '法人名義での契約' => 'company_contract',
                                    'ペット' => 'pet',
                               ),
                                '物件管理事務所' => array(
                                    '　' => 'reception',
                               ),
                            );
                            $icon = array(
                               'インターネット' => array('img' => '', 'name' => 'fa fa-wifi', 'status' => ''),
                                '電気代' => array('img' => '', 'name' => 'fa fa-lightbulb-o', 'status' => ''),
                                '水道代' => array('img' => '', 'name' => 'fa fa-tint', 'status' => ''),
                                'ケーブルTV' => array('img' => '', 'name' => 'fa fa-television', 'status' => ''),
                                '日本のテレビ放送' => array('img' => '', 'name' => 'fa fa-circle', 'status' => ''),
                                'AV機器' => array('img' => '', 'name' => 'fa fa-video-camera', 'status' => ''),
                                '洗濯機' => array('img' => 'maygiat.png', 'name' => '', 'status' => ''),
                                '乾燥機' => array('img' => '', 'name' => 'fa fa-sun-o', 'status' => ''),
                                'バスタブ' => array('img' => 'noilau.png', 'name' => '', 'status' => ''),

                                'ウォッシュレット' => array('img' => 'phunnuoc.png', 'name' => '', 'status' => ''),
                                 'メイドサービス' => array('img' => '', 'name' => 'fa fa-hand-paper-o', 'status' => ''),
                                'リネン類の交換' => array('img' => '', 'name' => 'fa fa-refresh', 'status' => ''),
                                'ランドリーサービス' => array('img' => 'coc.png', 'name' => '', 'status' => ''),
                                'バルコニー' => array('img' => '', 'name' => 'fa fa-leaf', 'status' => ''),
                                '窓' => array('img' => 'cuaso.png', 'name' => '', 'status' => ''),
                                '法人名義での契約' => array('img' => '', 'name' => 'fa fa-pencil', 'status' => ''),
                                'ペット' => array('img' => 'maygiat.png', 'name' => 'fa fa-paw', 'status' => ''),
                            );
                            $status = array(
                                '物件管理事務所' => 'hide',
                                '公共料金' => '',
                                '室内付帯設備' => '',
                                'バスルーム' => '',
                                'サービス情報' => 'hide',
                                'その他' => 'hide',
                                '契約' => '',
                            );
                            if ('コンドミニアム' == $estate->estate_type) {
                                unset($options['室内付帯設備']);
                                unset($options['バスルーム']);
                                unset($options['サービス情報']);
                                unset($options['その他']);
                            } elseif ('アパートメント' == $estate->estate_type) {
                                unset($options['サービス情報']);
                                unset($options['その他']);
                            }
                            foreach ($options as $th => $meta_keys) : ?>
                            <div class="pro_1 col-xs-24  icon-pc-fix">
                                <div class="row">
                                    <label class="col-sm-5  col-xs-24 title"><?php echo $th; ?></label>
                                    <div class="col-sm-19 col-xs-24  tabl_sum">

                                        <table class="table table-bordered borderless">
                                            <tbody>
                                            <?php
                                            $counter = 0;
                                            foreach ($meta_keys as $key_label => $key_name) : $counter++; ?>
                                                <tr>
                                                    <td class="col-xs-1 cen_icon">
                                                        <?php
                                                        foreach ($icon as $key => $value) {
                                                            if ($key == $key_label) {
                                                                if ($value['name'] != '') {
                                                                    ?>
                                                                    <p class="<?php echo $value['name']; ?>"></p>
                                                                <?php

                                                                } else {
                                                                    ?>
                                                                    <p>
                                                                        <img id="img_icon"
                                                                             src="/assets/html/asset/image/<?php
                                                                                echo $value['img']; ?>">
                                                                    </p>
                                                        <?php

                                                                }
                                                                break;
                                                            }
                                                        }
                                                        ?>
                                                    </td>

                                                    <td class="col-sm-10 col-xs-24" style="font-weight: bold;">
                                                        <?php h($key_label) ?><br>
                                                        <span class="icon-mb-fix" style="font-weight:100">
                                                            <?php
                                                            if (isset($metas[$estate->ID][$key_name]->name)) {
                                                                switch ($key_name) {
                                                                    case 'bf':
                                                                        if ($metas[$estate->ID][$key_name]->name) {
                                                                            echo '有り';
                                                                            $flg = array();
                                                                            foreach (array('bf_one' => '1回',
                                                                                         'bf_month' => '月', ) as
                                                                                     $key => $label) {
                                                                                if (isset(
                                                                                    $metas[$estate->ID][$key]->name
                                                                                ) && is_numeric(
                                                                                    $metas[$estate->ID][$key]->name
                                                                                )
                                                                                ) {
                                                                                    $flg[] = sprintf(
                                                                                        '%sバーツ / %s',
                                                                                        number_format(
                                                                                            $metas[$estate->ID][$key]
                                                                                                ->name
                                                                                        ),
                                                                                        $label
                                                                                    );
                                                                                }
                                                                            }
                                                                            if (!empty($flg)) {
                                                                                printf('（%s）', implode(', ', $flg));
                                                                            }
                                                                        } else {
                                                                            echo '無し';
                                                                        }
                                                                        break;
                                                                    default:
                                                                        if (empty($metas[$estate->ID][$key_name]->name)
                                                                        ) {
                                                                            echo '---';
                                                                        } else {
                                                                            translate_meta(
                                                                                $key_name,
                                                                                $metas[$estate->ID][$key_name]->name
                                                                            );
                                                                        }
                                                                        $prices = array(
                                                                            'internet' => 'internet_price',
                                                                            'electric' => 'electric_price',
                                                                            'water' => 'water_price',
                                                                            'tv' => 'tv_price',
                                                                        );
                                                                        if (array_key_exists($key_name, $prices)) {
                                                                            $price = null;
                                                                            switch ($key_name) {
                                                                                case 'tv':
                                                                                case 'internet':
                                                                                    if (false !== array_search($metas[$estate->ID][$key_name]->name, array('Pay', 'Must Pay')) && isset($metas[$estate->ID][$prices[$key_name]])) {
                                                                                        $price = $metas[$estate->ID][$prices[$key_name]]->name;
                                                                                    }
                                                                                    break;
                                                                                default:
                                                                                    if (isset($metas[$estate->ID][$prices[$key_name]])) {
                                                                                        $price = $metas[$estate->ID][$prices[$key_name]]->name;
                                                                                    }
                                                                                    break;
                                                                            }
                                                                            if (is_numeric($price)) {
                                                                                printf('（%sバーツ）', number_format($price));
                                                                            } elseif (!empty($price)) {
                                                                                printf('（%s）', h($price, false));
                                                                            }
                                                                        }
                                                                        break;
                                                                }
                                                            }
                                                            ?>
                                                        </span>
                                                    </td>
                                                    <td class="col-sm-14 col-xs-24 icon-pc-fix">
                                                        <?php
                                                        if (isset($metas[$estate->ID][$key_name]->name)) {
                                                            switch ($key_name) {
                                                                case 'bf':
                                                                    if ($metas[$estate->ID][$key_name]->name) {
                                                                        echo '有り';
                                                                        $flg = array();
                                                                        foreach (array('bf_one' => '1回', 'bf_month' => '月') as $key => $label) {
                                                                            if (isset($metas[$estate->ID][$key]->name) && is_numeric($metas[$estate->ID][$key]->name)) {
                                                                                $flg[] = sprintf('%sバーツ / %s', number_format($metas[$estate->ID][$key]->name), $label);
                                                                            }
                                                                        }
                                                                        if (!empty($flg)) {
                                                                            printf('（%s）', implode(', ', $flg));
                                                                        }
                                                                    } else {
                                                                        echo '無し';
                                                                    }
                                                                    break;
                                                                default:
                                                                    if (empty($metas[$estate->ID][$key_name]->name)) {
                                                                        echo '---';
                                                                    } else {
                                                                        translate_meta($key_name, $metas[$estate->ID][$key_name]->name);
                                                                    }
                                                                    $prices = array(
                                                                        'internet' => 'internet_price',
                                                                        'electric' => 'electric_price',
                                                                        'water' => 'water_price',
                                                                        'tv' => 'tv_price',
                                                                    );
                                                                    if (array_key_exists($key_name, $prices)) {
                                                                        $price = null;
                                                                        switch ($key_name) {
                                                                            case 'tv':
                                                                            case 'internet':
                                                                                if (false !== array_search($metas[$estate->ID][$key_name]->name, array('Pay', 'Must Pay')) && isset($metas[$estate->ID][$prices[$key_name]])) {
                                                                                    $price = $metas[$estate->ID][$prices[$key_name]]->name;
                                                                                }
                                                                                break;
                                                                            default:
                                                                                if (isset($metas[$estate->ID][$prices[$key_name]])) {
                                                                                    $price = $metas[$estate->ID][$prices[$key_name]]->name;
                                                                                }
                                                                                break;
                                                                        }
                                                                        if (is_numeric($price)) {
                                                                            printf('（%sバーツ）', number_format($price));
                                                                        } elseif (!empty($price)) {
                                                                            printf('（%s）', h($price, false));
                                                                        }
                                                                    }
                                                                    break;
                                                            }
                                                        }
                                                        ?>
                                                     </td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <?php if ('室内付帯設備' == $th) : ?>
                                                <tr class="icon-pc-fix">
                                                    <td class="col-xs-1 cen_icon">
                                                        <p class="  fa fa-cutlery "></p>
                                                    </td>
                                                    <td class="col-sm-10 col-xs-24" style="font-weight:bold">キッチン設備</td>
                                                    <td class="col-sm-14 col-xs-24">
                                                        <?php
                                                        $kitchen_list = array();
                                                        foreach ($kitchens[$estate->ID] as $kitchen) {
                                                            $kitchen_list[] = $kitchen->name;
                                                        }
                                                        if (!empty($kitchen_list)) :
                                                            echo implode('・', $kitchen_list);
                                                        else :
                                                            echo '---';
                                                        endif;
                                                        ?>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <div class="pro_1 col-xs-24  icon-mb-fix <?php
                        foreach ($status as $key => $value) {
                            if ($key == $th) {
                                echo $value;
                            }
                        }
                        ?>">
                            <div class="row">
                                <label class="col-sm-5  col-xs-12 title"><?php echo $th; ?></label>
                                <div class="col-sm-19 col-xs-24  tabl_sum">
                                    <table class="table table-striped borderless">
                                        <tbody>
                                        <?php $counter = 0; foreach ($meta_keys as $key_label => $key_name) : $counter++; ?>
                                            <tr>
                                                <td class="col-xs-3 cen_icon">
                                                    <?php
                                                    foreach ($icon as $key => $value) {
                                                        if ($key == $key_label) {
                                                            if ($value['name'] != '') {
                                                                ?>
                                                                <p class="<?php echo $value['name']; ?>"></p>
                                                            <?php 
                                                            } else {
                                                                ?>
                                                                <p>
                                                                    <img id="img_icon"
                                                                         src="/assets/html/asset/image/<?php
                                                                            echo $value['img']; ?>">
                                                                </p>
                                                            <?php 
                                                            }
                                                            break;
                                                        }
                                                    }
                                                    ?>
                                                    </td>

                                                    <td class="col-sm-10 col-xs-24" style="font-weight:bold">
                                                        <?php h($key_label) ?><br>
                                                        <span class="icon-mb-fix" style="font-weight:100">
                                                            <?php
                                                            if (isset($metas[$estate->ID][$key_name]->name)) {
                                                                switch ($key_name) {
                                                                    case 'bf':
                                                                        if ($metas[$estate->ID][$key_name]->name) {
                                                                            echo '有り';
                                                                            $flg = array();
                                                                            foreach (array('bf_one' => '1回', 'bf_month' => '月') as $key => $label) {
                                                                                if (isset($metas[$estate->ID][$key]->name) && is_numeric($metas[$estate->ID][$key]->name)) {
                                                                                    $flg[] = sprintf('%sバーツ / %s', number_format($metas[$estate->ID][$key]->name), $label);
                                                                                }
                                                                            }
                                                                            if (!empty($flg)) {
                                                                                printf('（%s）', implode(', ', $flg));
                                                                            }
                                                                        } else {
                                                                            echo '無し';
                                                                        }
                                                                        break;
                                                                    default:
                                                                        if (empty($metas[$estate->ID][$key_name]->name)) {
                                                                            echo '---';
                                                                        } else {
                                                                            translate_meta($key_name, $metas[$estate->ID][$key_name]->name);
                                                                        }
                                                                        $prices = array(
                                                                            'internet' => 'internet_price',
                                                                            'electric' => 'electric_price',
                                                                            'water' => 'water_price',
                                                                            'tv' => 'tv_price',
                                                                        );
                                                                        if (array_key_exists($key_name, $prices)) {
                                                                            $price = null;
                                                                            switch ($key_name) {
                                                                                case 'tv':
                                                                                case 'internet':
                                                                                    if (false !== array_search($metas[$estate->ID][$key_name]->name, array('Pay', 'Must Pay')) && isset($metas[$estate->ID][$prices[$key_name]])) {
                                                                                        $price = $metas[$estate->ID][$prices[$key_name]]->name;
                                                                                    }
                                                                                    break;
                                                                                default:
                                                                                    if (isset($metas[$estate->ID][$prices[$key_name]])) {
                                                                                        $price = $metas[$estate->ID][$prices[$key_name]]->name;
                                                                                    }
                                                                                    break;
                                                                            }
                                                                            if (is_numeric($price)) {
                                                                                printf('（%sバーツ）', number_format($price));
                                                                            } elseif (!empty($price)) {
                                                                                printf('（%s）', h($price, false));
                                                                            }
                                                                        }
                                                                        break;
                                                                }
                                                            }
                                                            ?>
                                                        </span>
                                                    </td>
                                                <td class="col-sm-14 col-xs-24 icon-pc-fix">
                                                    <?php
                                                    if (isset($metas[$estate->ID][$key_name]->name)) {
                                                        switch ($key_name) {
                                                            case 'bf':
                                                                if ($metas[$estate->ID][$key_name]->name) {
                                                                    echo '有り';
                                                                    $flg = array();
                                                                    foreach (array('bf_one' => '1回', 'bf_month' => '月') as $key => $label) {
                                                                        if (isset($metas[$estate->ID][$key]->name) && is_numeric($metas[$estate->ID][$key]->name)) {
                                                                            $flg[] = sprintf('%sバーツ / %s', number_format($metas[$estate->ID][$key]->name), $label);
                                                                        }
                                                                    }
                                                                    if (!empty($flg)) {
                                                                        printf('（%s）', implode(', ', $flg));
                                                                    }
                                                                } else {
                                                                    echo '無し';
                                                                }
                                                                break;
                                                            default:
                                                                if (empty($metas[$estate->ID][$key_name]->name)) {
                                                                    echo '---';
                                                                } else {
                                                                    translate_meta($key_name, $metas[$estate->ID][$key_name]->name);
                                                                }
                                                                $prices = array(
                                                                    'internet' => 'internet_price',
                                                                    'electric' => 'electric_price',
                                                                    'water' => 'water_price',
                                                                    'tv' => 'tv_price',
                                                                );
                                                                if (array_key_exists($key_name, $prices)) {
                                                                    $price = null;
                                                                    switch ($key_name) {
                                                                        case 'tv':
                                                                        case 'internet':
                                                                            if (false !== array_search($metas[$estate->ID][$key_name]->name, array('Pay', 'Must Pay')) && isset($metas[$estate->ID][$prices[$key_name]])) {
                                                                                $price = $metas[$estate->ID][$prices[$key_name]]->name;
                                                                            }
                                                                            break;
                                                                        default:
                                                                            if (isset($metas[$estate->ID][$prices[$key_name]])) {
                                                                                $price = $metas[$estate->ID][$prices[$key_name]]->name;
                                                                            }
                                                                            break;
                                                                    }
                                                                    if (is_numeric($price)) {
                                                                        printf('（%sバーツ）', number_format($price));
                                                                    } elseif (!empty($price)) {
                                                                        printf('（%s）', h($price, false));
                                                                    }
                                                                }
                                                                break;
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <?php if ('室内付帯設備' == $th) : ?>
                                            <tr class="icon-pc-fix">
                                                <td class="col-xs-1 cen_icon">
                                                    <p class="  fa fa-cutlery "></p>
                                                </td>
                                                <td class="col-sm-10 col-xs-24" style="font-weight:bold">キッチン設備</td>
                                                <td class="col-sm-14 col-xs-24">
                                                    <?php
                                                    $kitchen_list = array();
                                                    foreach ($kitchens[$estate->ID] as $kitchen) {
                                                        $kitchen_list[] = $kitchen->name;
                                                    }
                                                    if (!empty($kitchen_list)) :
                                                        echo implode('・', $kitchen_list);
                                                    else :
                                                        echo '---';
                                                    endif;
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php if ('室内付帯設備' == $th) : ?>
                                            <tr class="icon-fix-pc">
                                                <td class="col-xs-3 cen_icon bg-white">
                                                    <p class="fa fa-cutlery"></p>
                                                </td>
                                                <td class="col-sm-10 col-xs-24 bg-white" style="font-weight:bold">
                                                    キッチン設備  <br><span style="font-weight: 100;">
                                                    <?php
                                                    $kitchen_list = array();
                                                    foreach ($kitchens[$estate->ID] as $kitchen) {
                                                        $kitchen_list[] = $kitchen->name;
                                                    }
                                                    if (!empty($kitchen_list)) :
                                                        echo implode('・', $kitchen_list);
                                                    else :
                                                        echo '---';
                                                    endif;
                                                    ?></span>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                            <?php endforeach; ?>
                            <div class="pro_1 col-xs-24 icon-mb-fix">
                                <div class="row">
                                    <label class="col-sm-5  col-xs-12 title">物件管理事務所</label>
                                    <p>
                                        <?php
                                        if (isset($metas[$estate->ID][$key_name]->name)) {
                                            switch ($key_name) {
                                                case 'bf':
                                                    if ($metas[$estate->ID][$key_name]->name) {
                                                        echo '有り';
                                                        $flg = array();
                                                        foreach (array('bf_one' => '1回', 'bf_month' => '月') as $key => $label) {
                                                            if (isset($metas[$estate->ID][$key]->name) && is_numeric($metas[$estate->ID][$key]->name)) {
                                                                $flg[] = sprintf('%sバーツ / %s', number_format($metas[$estate->ID][$key]->name), $label);
                                                            }
                                                        }
                                                        if (!empty($flg)) {
                                                            printf('（%s）', implode(', ', $flg));
                                                        }
                                                    } else {
                                                        echo '無し';
                                                    }
                                                    break;
                                                default:
                                                    if (empty($metas[$estate->ID][$key_name]->name)) {
                                                        echo '---';
                                                    } else {
                                                        translate_meta($key_name, $metas[$estate->ID][$key_name]->name);
                                                    }
                                                    $prices = array(
                                                        'internet' => 'internet_price',
                                                        'electric' => 'electric_price',
                                                        'water' => 'water_price',
                                                        'tv' => 'tv_price',
                                                    );
                                                    if (array_key_exists($key_name, $prices)) {
                                                        $price = null;
                                                        switch ($key_name) {
                                                            case 'tv':
                                                            case 'internet':
                                                                if (false !== array_search($metas[$estate->ID][$key_name]->name, array('Pay', 'Must Pay')) && isset($metas[$estate->ID][$prices[$key_name]])) {
                                                                    $price = $metas[$estate->ID][$prices[$key_name]]->name;
                                                                }
                                                                break;
                                                            default:
                                                                if (isset($metas[$estate->ID][$prices[$key_name]])) {
                                                                    $price = $metas[$estate->ID][$prices[$key_name]]->name;
                                                                }
                                                                break;
                                                        }
                                                        if (is_numeric($price)) {
                                                            printf('（%sバーツ）', number_format($price));
                                                        } elseif (!empty($price)) {
                                                            printf('（%s）', h($price, false));
                                                        }
                                                    }
                                                    break;
                                            }
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <div class="pro_1 col-xs-24">
                                <div class="row">
                                    <p>※物件内でも部屋タイプごとに異なる可能性があります。</p>
                                </div>
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane fade ">
                            <div class="row">
                                <div id="photo" class="tab-content">
                                    <h3 class="line-title">外観</h3>
                                    <div style="margin-bottom: 30px;" class="pict-box col-lg-12 col-sm-12 col-xs-24">
                                        <img style="width: 100%;" alt="<?php h($eyecatch[$estate->ID]['alt']) ?>"
                                             src="<?php echo $eyecatch[$estate->ID]['url'] ?>" />
                                    </div>
                                    <?php if ('コンドミニアム' == $estate->estate_type) : ?>
                                    <?php endif; ?>
                                    <?php
                                    // サムネイルをシャッフル
                                    $photos = array();
                                    foreach ($room_thumbs as $thumbnail) {
                                        if (!isset($photos[$thumbnail['large']['room_type_id']])) {
                                            $photos[$thumbnail['large']['room_type_id']] = array();
                                        }
                                        $photos[$thumbnail['large']['room_type_id']][] = $thumbnail['large'];
                                    }
                                    // ループ
                                    if (empty($photos)) :
                                        printf('<p class="no-result">この物件には部屋内部の写真がありません。</p>');
                                    else :
                                        foreach ($photos as $room_type_id => $pictures) : ?>
                                            <h3 class="line-title"><?php echo isset($room_type_label[$room_type_id]) ? h($room_type_label[$room_type_id], false) : '---'?></h3>
                                            <div class="pict-wrap">
                                                <?php $counter = 0; foreach ($pictures as $picture) : $counter++; ?>
                                                    <?php if ($counter % 2 == 1) : ?>
                                                        <div class="clearfix">
                                                    <?php endif; ?>
                                                    <div class="pict-box col-lg-12 col-sm-12 col-xs-24 <?php if ($counter % 2 == 0) {
                                                echo ' even';
                                            }?>">
                                                        <img src="<?php h($picture['url']) ?>"
                                                             alt="<?php h($picture['alt'])  ?>" />
                                                    </div>
                                                    <?php if ($counter % 2 == 0 || $counter == count($pictures)) : ?>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </div>
                                            <?php
                                        endforeach;
                                    endif;
                                    //     設備写真を出力
                                    if (!empty($facility_thumb)) :  ?>
                                        <h3 class="line-title">設備紹介</h3>
                                        <div class="pict-wrap">
                                            <?php $counter = 0; foreach ($facility_thumb as $picture) : $counter++; ?>
                                                <?php if ($counter % 2 == 1) : ?>
                                                    <div class="clearfix">
                                                <?php endif; ?>
                                                <div class="pict-box col-lg-12 col-sm-12 col-xs-24 <?php if ($counter % 2 == 0) {
                                        echo ' even';
                                    } ?>">
                                                    <img src="<?php h($picture['large']['url'])  ?>" alt="<?php h($picture['large']['alt'])  ?>" />
                                                </div>
                                                <?php if ($counter % 2 == 0 || $counter == count($facility_thumb)) : ?>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div><!-- //#photo -->
                            </div>
                        </div>

                            <div style="width: 80%; margin: auto;" id="menu2" class="tab-pane fade">
                            <?php foreach ($list_videos as $key => $value) : ?>
                                <div id="video" class="tab-video tab-video embed-responsive embed-responsive-16by9">
                                    <script type="text/javascript">
                                            //<![CDATA[
                                        /***********************************************************************
                                        # roomroom.tv youtubeAPI
                                        ***********************************************************************/
                                        var strID = '<?= $value->name; ?>';
                                        if (strID) {
                                            document.write('<iframe class="embed-responsive-item"  allowfullscreen="" frameborder="0" id="ifrm" style="width:100%;" src="https://www.youtube.com/embed/' + strID + '"></iframe>');
                                        }
                                        window.addEventListener("message", receiveSize, false);
                                        function receiveSize(e) {
                                            if (e.origin === "http://roomroom.tv") {
                                                document.getElementById("frameidrmrm").style.height = e.data + "px";
                                            }
                                        }
                                        //]]>
                                    </script>
                                </div><!-- //#video -->
                            <?php endforeach; ?>
                            </div>
                        <button class = "col-xs-24 desc_search">
                            <a data-toggle="collapse" data-target="#demo" class="fa fa-chevron-down"><i>お問い合わせフォームを開く</i>
                            </a>
                        </button>
                            <div class=" col-xs-24 collapse out" id="demo">
                                <div class="col-xs-24" id="contact-content">
                                <div class="row">
                                    <div class="col-xs-24 content">
                                        <div class="row">
                                            <div class="col-xs-24 bg ">
                                                <div class="col-xs-24 fix-bg">
                                                    <div class="col-xs-24 pd-15">
                                                        <h2> フォームからのお問い合わせ</h2>
                                                        <p>賃貸物件をお探しのお客様は下記メールフォームよりお問い合わせください。</p>
                                                        <ul class="list">
                                                            <li>バンコク中心部の家賃３万バーツ以上の物件からお取り扱いしております。</li>
                                                            <li>契約期間は１年からとなります。</li>
                                                            <li>一戸建、店舗物件は扱わせて頂いておりません。</li>
                                                            <li><span class="diff-color">* </span>は必須項目です。</li>
                                                        </ul>
                                                    </div>
                                                    <div class="col-xs-24 user">
                                                        <h3><i class="fa fa-user" aria-hidden="true"></i> お客様情報</h3>
                                                    </div>
                                                    <?php $this->load->view('fr-contact'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-5 col-sm-offset-1 nav_right col-xs-24">
            <div class="col-xs-24 img-convoi">
                <div class="row">
                    <a href="/ishikawa-news/">
                        <img src="/assets/html/asset/image/blueE.jpg" alt="ISHIKAWA NEWS">
                    </a>
                </div>
            </div>
            <div class="col-xs-24 market">
                <div class="col-xs-24 bts">
                    <h4 class="text-center icon-pc"><i class="fa fa-map-marker" aria-hidden="true"></i></h4>
                    <h4 class="text-center icon-mb"><i class="fa fa-map-marker" aria-hidden="true"></i></h4>
                    <h4 class="text-center">エリア検索</h4>
                    <div class="col-xs-24 fix-row">
                        <a href="/estates/area/39"><p class="left-15"><i class="fa fa-caret-right" aria-hidden="true"></i></p><p class="hvr-underline-from-left">BTS アソーク駅~エカマイ駅 (北側)</p></a>
                    </div>
                    <div class="col-xs-24 fix-row">
                    <a href="/estates/area/40"> <p class="left-15"><i class="fa fa-caret-right" aria-hidden="true"></i></p><p class="hvr-underline-from-left">BTS アソーク駅~エカマイ駅 (南側)</p></a>
                    </div>
                    <div class="col-xs-24 fix-row">
                     <a href="/estates/area/42"> <p class="left-15"><i class="fa fa-caret-right" aria-hidden="true"></i></p><p class="hvr-underline-from-left">BTS ナナ駅~アソーク駅 </p></a>
                    </div>
                    <div class="col-xs-24 fix-row">
                     <a href="/estates/area/49"> <p class="left-15"><i class="fa fa-caret-right" aria-hidden="true"></i></p><p class="hvr-underline-from-left">プルンチット地区</p></a>
                    </div>
                    <div class="col-xs-24 fix-row">
                     <a href="/estates/area/50"> <p class="left-15"><i class="fa fa-caret-right" aria-hidden="true"></i></p><p class="hvr-underline-from-left">シーロム / サトーン地区</p></a>
                    </div>
                    <div class="col-xs-24 fix-row">
                     <a href="/estates/area/51"> <p class="left-15"><i class="fa fa-caret-right" aria-hidden="true"></i></p><p class="hvr-underline-from-left">その他の地区(バンコク東部)</p></a>
                    </div>
                </div>
                <a href="/search/map">
                    <div class="col-xs-11 col-sm-24 after-bts hv">
                        <h3 class="icon-pc"><i class="fa fa-map" aria-hidden="true"></i> マップ検索</h3>
                        <h3 class="icon-mb"><i class="fa fa-map" aria-hidden="true"></i></h3>
                        <h3 class="icon-mb"> マップ検索</h3>
                    </div>
                </a>
                <a href="/search/alphabet">
                    <div class="col-xs-11 col-xs-offset-2 col-sm-24 col-sm-offset-0 after-bts-atz hv">
                        <h3 class="icon-pc"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i> アルファベットから探す</h3>
                        <h3 class="icon-mb"><i class="fa fa-sort-alpha-asc" aria-hidden="true"></i></h3>
                        <h3 class="icon-mb"> アルファベットから探す</h3>
                    </div>
                 </a>
                <a href="/search/getsearch">
                    <div class="col-xs-24 after-bts-search hv">
                        <h3 class="icon-pc"><i class="fa fa-search" aria-hidden="true"></i> こだわり条件検索</h3>
                        <h3 class="icon-mb"><i class="fa fa-search" aria-hidden="true"></i></h3>
                        <h3 class="icon-mb"> こだわり条件検索</h3>
                    </div>
                </a>
            </div>
            <div class="col-xs-24 social">
                <h3>
                    <a href="https://facebook.com/ishikawashojibangkok/"
                       target="_blank" class="hv"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                    <a href="https://www.youtube.com/channel/UChUl91eCWqxwEhcWZKYY3iQ" class="hv" target="_blank"><i
                            class="fa fa-youtube" aria-hidden="true"></i></a>
                </h3>
            </div>
        </div>
    </div>
</div>
<script>
    if ($('.desc_text').is(':empty')) {
        $('.desc_text').remove();}
</script>
<script>
    $('.desc_search').click(function(){
        $('#demo').slideToggle('fast');
    });

    function showImageTab(){
        $('#showImageGallery').click();
        $('html, body').animate({
            scrollTop: $('#showImageGallery').offset().top
        }, 1000);
    }
</script>
<script src="/assets/html/js/js.js"></script>
