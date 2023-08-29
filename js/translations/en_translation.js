var translations = {};
translations["title_text"] 					= "Polirons | awesome technologies";
translations["call_us"] 					= "Call Us: (+90) 850 303 75 76";
translations["translate_text"] 				= "Türkçe";

translations["site_title"] 					= "Polirons";
translations["site_description"] 			= "\"awesome technologies\"";

translations["menu_item_home"] 				= "Home";
translations["menu_item_about"] 			= "About";
translations["menu_item_products"] 			= "Products";
translations["menu_item_contactus"]			= "Contact Us";

translations["slide_title_polithinq"]		= "polithinq™";
translations["slide_subtitle_polithinq"]	= "Industry 4.0 portal";
translations["slide_summarytext_polithinq"]	= "polithinq™ is an IIoT platform with Industry 4.0 technologies that allows you to monitor and manage your business from anywhere you are connected to the internet by combining the data collected from your machines and equipment with powerful cloud infrastructure.";
translations["slide_button_polithinq"]		= "More Details";

translations["slide_title_polimine"]		= "polimine™";
translations["slide_subtitle_polimine"]		= "A Special Integrated Portal for underground mines";
translations["slide_summarytext_polimine"]	= "In addition to systems mandated by regulations such as <b> live personnel tracking </b> and <b> gas measurement systems </b> in polimine™ underground mines; It is a mine automation solution that incorporates additional modules such as <b> automatic fan control</b>, <b>vehicle signaling systems</b>, <b>critical area control</b> that will increase the efficiency of your business and optimize your consumption, and can integrate the data it collects with the IT systems of your business.";
translations["slide_button_polimine"]		= "Go to Products Page";

translations["slide_title_poliwipe"]		= "poliwipe™";
translations["slide_subtitle_poliwipe"]		= "Laundry Technologies";
translations["slide_summarytext_poliwipe"]	= "poliwipe™, It is a technological product group that offers technologies such as <b>Textile Tracking with RFID</b>, <b>Chemical Dosing Systems</b>, <b>Machine Efficiency Tracking</b>, which are frequently needed by industrial laundries, to the use of laundries with cloud-based solutions in line with the Industry 4.0 concept.";
translations["slide_button_poliwipe"]		= "Go to Products Page";

translations["slide_title_special"]			= "Special Solutions";
translations["slide_subtitle_special"]		= "Custom Automation Solutions for You";
translations["slide_summarytext_special"]	= "As Polirons Technology, we transfer our experience in areas such as data acquisition, process control and positioning systems to your special projects. We can support the realization of your projects and ideas with our experienced R&D team.";
translations["slide_button_special"]		= "Contact Us";

translations["company_aboutus"]				= "With 10 years of knowledge and experience, Polirons Technology develops Industry 4.0 compatible; Environment, Vehicle, Equipment, Personnel Monitoring, Production Process Control, Energy Management and System Automation solutions using up-to-date software and hardware technologies.";
translations["company_button_aboutus"]		= "Read More";

translations["customerneed"]				= "What do you need?";

translations["datacollection"]				= "Data collection &amp; Analysis";
translations["datacollection_details"]		= "Collection and/or remote management of your machine and equipment data via local gateways";

translations["customsolution"]				= "Customized Solutions";
translations["customsolution_details"]		= "As Polirons Technology, we transfer our experience in areas such as data acquisition, process control, positioning systems to your special projects.";

translations["copyright"]					= "Copyright 2023 Polirons. All rights reserved";

for (let key in translations) {
	let nodes = document.querySelectorAll("[translation_key=" + key + "]");

	for (let index = 0; index < nodes.length; index++) {
		nodes[index].innerHTML = nodes[index].innerHTML.replace('%text%',translations[key]);
	}
}
