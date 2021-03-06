<?php

$sliderPage = new QodeAdminPage("_slider", "Qode Slider", "fa fa-sliders");
$qodeFramework->qodeOptions->addAdminPage("slider",$sliderPage);

// General Style

$panel3 = new QodePanel("General Style","navigation_control_style");
$sliderPage->addChild("panel3",$panel3);

	$qs_slider_height_tablet = new QodeField("text","qs_slider_height_tablet","","Slider Height For Tablet Portrait and Mobile Landscape View (px)","Define slider height for tablet devices - portrait view and mobile devices landscape view");
	$panel3->addChild("qs_slider_height_tablet",$qs_slider_height_tablet);

	$qs_slider_height_mobile = new QodeField("text","qs_slider_height_mobile","","Slider Height For Mobile Devices (px)","Define slider height for mobile devices");
	$panel3->addChild("qs_slider_height_mobile",$qs_slider_height_mobile);

//Buttons

$panel4 = new QodePanel("Buttons Style","buttons_panel");
$sliderPage->addChild("panel4",$panel4);
	
	$group1 = new QodeGroup("Button 1 Style","Define style for button 1.");
	$panel4->addChild("group1",$group1);
		$row1 = new QodeRow();
		$group1->addChild("row1",$row1);

			$qs_button_color = new QodeField("colorsimple","qs_button_color","","Text Color","This is some description");
			$row1->addChild("qs_button_color",$qs_button_color);

			$qs_button_hover_color = new QodeField("colorsimple","qs_button_hover_color","","Hover Text Color","This is some description");
			$row1->addChild("qs_button_hover_color",$qs_button_hover_color);

			$qs_button_background_color = new QodeField("colorsimple","qs_button_background_color","","Background Color","This is some description");
			$row1->addChild("qs_button_background_color",$qs_button_background_color);

			$qs_button_hover_background_color = new QodeField("colorsimple","qs_button_hover_background_color","","Background Hover Color","This is some description");
			$row1->addChild("qs_button_hover_background_color",$qs_button_hover_background_color);

		$row2 = new QodeRow(true);
		$group1->addChild("row2",$row2);
			
			$qs_button_border_color = new QodeField("colorsimple","qs_button_border_color","","Border Color","This is some description");
			$row2->addChild("qs_button_border_color",$qs_button_border_color);

			$qs_button_hover_border_color = new QodeField("colorsimple","qs_button_hover_border_color","","Border Hover Color","This is some description");
			$row2->addChild("qs_button_hover_border_color",$qs_button_hover_border_color);

			$qs_button_border_width = new QodeField("textsimple","qs_button_border_width","","Border Width (px)","This is some description");
			$row2->addChild("qs_button_border_width",$qs_button_border_width);

			$qs_button_border_radius = new QodeField("textsimple","qs_button_border_radius","","Border radius (px)","This is some description");
			$row2->addChild("qs_button_border_radius",$qs_button_border_radius);

	$group2 = new QodeGroup("Button 2 Style","Define style for button 2.");
	$panel4->addChild("group2",$group2);
		$row1 = new QodeRow();
		$group2->addChild("row1",$row1);

			$qs_button2_color = new QodeField("colorsimple","qs_button2_color","","Text Color","This is some description");
			$row1->addChild("qs_button2_color",$qs_button2_color);

			$qs_button2_hover_color = new QodeField("colorsimple","qs_button2_hover_color","","Hover Text Color","This is some description");
			$row1->addChild("qs_button2_hover_color",$qs_button2_hover_color);

			$qs_button2_background_color = new QodeField("colorsimple","qs_button2_background_color","","Background Color","This is some description");
			$row1->addChild("qs_button2_background_color",$qs_button2_background_color);

			$qs_button2_hover_background_color = new QodeField("colorsimple","qs_button2_hover_background_color","","Background Hover Color","This is some description");
			$row1->addChild("qs_button2_hover_background_color",$qs_button2_hover_background_color);

		$row2 = new QodeRow(true);
		$group2->addChild("row2",$row2);
			
			$qs_button2_border_color = new QodeField("colorsimple","qs_button2_border_color","","Border Color","This is some description");
			$row2->addChild("qs_button2_border_color",$qs_button2_border_color);

			$qs_button2_hover_border_color = new QodeField("colorsimple","qs_button2_hover_border_color","","Border Hover Color","This is some description");
			$row2->addChild("qs_button2_hover_border_color",$qs_button2_hover_border_color);

			$qs_button2_border_width = new QodeField("textsimple","qs_button2_border_width","","Border Width (px)","This is some description");
			$row2->addChild("qs_button2_border_width",$qs_button2_border_width);

			$qs_button2_border_radius = new QodeField("textsimple","qs_button2_border_radius","","Border radius (px)","This is some description");
			$row2->addChild("qs_button2_border_radius",$qs_button2_border_radius);	