'use strict';

import React from "react"
import PropTypes from 'prop-types'
import { Tab, Tabs, TabList, TabPanel } from 'react-tabs';
import '../../css/Form/react-tabs.scss';
import FormContainer from './FormContainer'

export default function FormRenderTabs(props) {
    const {
        template,
        ...otherProps
    } = props

    const tabTags = Object.keys(template).map(name => {
        const tab = template[name]
        const disabled = tab.display ? false : true
        return (
            <Tab
                key={name}
                disabled={disabled}>
                {tab.label}
            </Tab>
        )
    })

    const content = Object.keys(template).map(name => {
        const page = template[name]
        return (
            <TabPanel key={name}>
                {page.display ?
                    <FormContainer
                        {...otherProps}
                        template={page.container}
                    /> : <div>Empty Tab</div> }
            </TabPanel>
        )
    })

    return (
        <Tabs defaultIndex={template.selectedTab}>
            <TabList>
                {tabTags}
            </TabList>
            {content}
        </Tabs>
    )
}

FormRenderTabs.propTypes = {
    template: PropTypes.object.isRequired,
}
