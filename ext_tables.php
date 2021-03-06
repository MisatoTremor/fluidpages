<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Fluid Pages: PAGE');

t3lib_div::loadTCA('pages');
t3lib_extMgm::addTCAcolumns('pages', array(
	'tx_fed_page_controller_action' => array (
		'exclude' => 1,
		'label' => 'LLL:EXT:fluidpages/Resources/Private/Language/locallang_db.xml:pages.tx_fed_page_controller_action',
		'config' => array (
			'type' => 'user',
			'userFunc' => 'Tx_Fluidpages_Backend_PageLayoutSelector->renderField'
		)
	),
	'tx_fed_page_controller_action_sub' => array (
		'exclude' => 1,
		'label' => 'LLL:EXT:fluidpages/Resources/Private/Language/locallang_db.xml:pages.tx_fed_page_controller_action_sub',
		'config' => array (
			'type' => 'user',
			'userFunc' => 'Tx_Fluidpages_Backend_PageLayoutSelector->renderField'
		)
	),
	'tx_fed_page_flexform' => Array (
		'exclude' => 1,
		'label' => 'LLL:EXT:fluidpages/Resources/Private/Language/locallang_db.xml:pages.tx_fed_page_flexform',
		'config' => array (
			'type' => 'flex',
		)
	),
), 1);
t3lib_extMgm::addToAllTCAtypes(
	'pages',
	'tx_fed_page_controller_action,tx_fed_page_controller_action_sub,tx_fed_page_flexform',
	'0,1,4',
	'before:layout'
);