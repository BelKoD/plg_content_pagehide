<?php
defined('_JEXEC') or die;


class PlgContentPageHide extends Joomla\CMS\Plugin\CMSPlugin
{

	/**
	 * Load the language file on instantiation.
	 *
	 * @var    boolean
	 * @since  3.7.0
	 */
	protected $autoloadLanguage = true;

	/**
	 * Adds additional fields to the user editing form
	 *
	 * @param   JForm $form The form to be altered.
	 * @param   mixed $data The associated data for the form.
	 *
	 * @return  boolean
	 * @since   1.6
	 */
	public function onContentPrepareForm($form, $data)
	{
		if (!($form instanceof JForm))
		{
			$this->_subject->setError('JERROR_NOT_A_FORM');

			return false;
		}

		// Check we are manipulating a valid form.
		$name = $form->getName();
		if (!in_array($name, array('com_menus.item')) || $data['type'] != 'component')
		{
			return true;
		}

		JForm::addFormPath(__DIR__ . '/fields');
		$form->loadFile('fields', false);
		return true;
	}
}