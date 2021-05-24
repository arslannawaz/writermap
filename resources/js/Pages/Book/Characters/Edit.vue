<template>
    <app-layout>
        <app-container width="w-full-container">
            <div class="grid grid-cols-2 grid-background absolute z-0 invisible xl:visible">
                <div class="col-span-1 col-bg_default"></div>
                <div class="col-span-1 col-bg"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-15 relative z-10">
                <div class="px-6 xl:px-12">
                    <div class="text-color-light text-sm uppercase label-default">Basics</div>
                    <div class="mt-2 bg-light p-10">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <div>
                                <label class="block label-default h-35px">First name</label>
                                <input type="text" :value="character.first_name" class="input-default input-default_border-none w-full" placeholder="First name"
                                       @change="updateCharacterAttribute({ group: 'basics', field: 'first_name', value: $event.target.value })">
                            </div>

                            <div>
                                <label class="block label-default h-35px">Last name</label>
                                <input type="text" :value="character.last_name" class="input-default input-default_border-none w-full" placeholder="Last name"
                                       @change="updateCharacterAttribute({ group: 'basics', field: 'last_name', value: $event.target.value })">
                            </div>
                        </div>

                        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-10">
                            <div>
                                <label class="block label-default h-35px">Nickname</label>
                                <input type="text" :value="getAttributeValue('nickname')" class="input-default input-default_border-none w-full" placeholder="Nickname"
                                       @change="updateCharacterAttribute({ group: 'basics', field: 'nickname', value: $event.target.value })">
                            </div>

                            <div>
                                <label class="block label-default h-35px">Gender</label>
                                <input type="text" :value="getAttributeValue('gender')" class="input-default input-default_border-none w-full" placeholder="Gender"
                                       @change="updateCharacterAttribute({ group: 'basics', field: 'gender', value: $event.target.value })">
                            </div>
                        </div>

                        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-10">
                            <div>
                                <label class="block label-default h-35px">Age</label>
                                <input type="text" :value="getAttributeValue('age')" class="input-default input-default_border-none w-full" placeholder="Age"
                                       @change="updateCharacterAttribute({ group: 'basics', field: 'age', value: $event.target.value })">
                            </div>

                            <div>
                                <label class="block label-default h-35px">Naitonality</label>
                                <input type="text" :value="getAttributeValue('nationality')" class="input-default input-default_border-none w-full" placeholder="Naitonality"
                                       @change="updateCharacterAttribute({ group: 'basics', field: 'nationality', value: $event.target.value })">
                            </div>
                        </div>
                    </div>

                    <div class="mt-10 block w-full"></div>

                    <div class="mt-8 flex justify-between items-center h-6">
                        <div class="text-color-light text-sm uppercase label-default">Physicality</div>
                        <div v-if="attributeInEdit && attributeInEdit.group === 'physicality'">Editing</div>
                    </div>
                    <div class="mt-2 bg-light p-10 chedit-box-border" :class="{'chedit-box-border_active': attributeInEdit && attributeInEdit.group === 'physicality'}">
                        <div class="flex justify-start">
                            <img ref="preview_physicality_image" v-if="getAttributeValue('image', 'physicality') === undefined" src="/storage/undefined-oval.png" alt="photo" height="84px" width="84px" style="height: 84px; width: 84px;" class="rounded-full flex-shrink-0">
                            <img ref="preview_physicality_image" v-if="getAttributeValue('image', 'physicality') !== undefined" :src="generateStorageUrl(getAttributeValue('image', 'physicality'))" alt="photo" height="84px" width="84px" style="height: 84px;width: 84px;" class="rounded-full flex-shrink-0">
                            <div class="ml-10">
                                <div class="label-default h-35px">Describe your character’s physicality</div>
                                <div ref="preview_physicality" class="mt-2 break-words h-100px">
                                    {{ getAttributeDescription('physicality') | truncate(70, '...') }}
                                    <div class="chet-preview__updated-at">{{ formatDate(getAttributeUpdatedAt('physicality')) }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-10 cursor-pointer text-color-dark font-semibold flex items-center"
                             @click="selectAttributeInEdit('physicality', 'physicality', 'Describe your character’s physicality. How do they carry themselves when they walk? What kind of clothing do they wear? Do they look dishevelled or glamorous?')">
                            <span>Answers</span>
                            <svg class="ml-4" xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9">
                                <g fill="none" fill-rule="evenodd">
                                    <g fill="#4E4D4B" fill-rule="nonzero">
                                        <g>
                                            <g>
                                                <path d="M13.93 4.043c-.042-.108-.104-.206-.184-.29l-3.5-3.5c-.343-.342-.9-.342-1.242 0-.343.344-.343.9 0 1.243L11.016 3.5H.875C.392 3.5 0 3.892 0 4.375s.392.875.875.875h10.141L9.004 7.254c-.166.164-.26.388-.26.621 0 .233.094.457.26.621.164.166.388.26.621.26.233 0 .457-.094.621-.26l3.5-3.5c.08-.083.142-.181.184-.289.088-.213.088-.451 0-.664z" transform="translate(-274 -608) translate(186 427) translate(88 181)"/>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>

                    <div class="mt-10 block w-full"></div>

                    <div class="mt-8 grid grid-cols-2 gap-10">
                        <div class="chet-preview">
                            <div class="flex justify-between items-center h-6">
                                <div class="text-color-light text-sm uppercase label-default">Traits</div>
                                <div v-if="attributeInEdit && attributeInEdit.field === 'trait_1'">Editing</div>
                            </div>
                            <div class="relative mt-2 bg-light p-10 chet-preview__block flex flex-col justify-between chedit-box-border" :class="{'chedit-box-border_active': attributeInEdit && attributeInEdit.field === 'trait_1'}">
                                <div>
                                    <div class="label-default h-35px">Explain character trait</div>
                                    <div ref="preview_trait_1" class="mt-2 break-words h-100px">
                                        {{ getAttributeDescription('trait_1') | truncate(70, '..') }}
                                        <div class="chet-preview__updated-at">{{ formatDate(getAttributeUpdatedAt('trait_1')) }}</div>
                                    </div>
                                </div>
                                <div class="mt-10 cursor-pointer text-color-dark font-semibold flex items-center"
                                     @click="selectAttributeInEdit('traits', 'trait_1', 'Select and explain character trait')">
                                    <span>View</span>
                                    <svg class="ml-4" xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9">
                                        <g fill="none" fill-rule="evenodd">
                                            <g fill="#4E4D4B" fill-rule="nonzero">
                                                <g>
                                                    <g>
                                                        <path d="M13.93 4.043c-.042-.108-.104-.206-.184-.29l-3.5-3.5c-.343-.342-.9-.342-1.242 0-.343.344-.343.9 0 1.243L11.016 3.5H.875C.392 3.5 0 3.892 0 4.375s.392.875.875.875h10.141L9.004 7.254c-.166.164-.26.388-.26.621 0 .233.094.457.26.621.164.166.388.26.621.26.233 0 .457-.094.621-.26l3.5-3.5c.08-.083.142-.181.184-.289.088-.213.088-.451 0-.664z" transform="translate(-274 -608) translate(186 427) translate(88 181)"/>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="chet-preview">
                            <div class="flex justify-between items-center h-6">
                                <div class="text-color-light text-sm uppercase label-default">Traits</div>
                                <div v-if="attributeInEdit && attributeInEdit.field === 'trait_2'">Editing</div>
                            </div>
                            <div class="relative mt-2 bg-light p-10 chet-preview__block flex flex-col justify-between chedit-box-border" :class="{'chedit-box-border_active': attributeInEdit && attributeInEdit.field === 'trait_2'}">
                                <div class="label-default h-35px">Explain character trait</div>
                                <div ref="preview_trait_2" class="mt-2 break-words h-100px">
                                    {{ getAttributeDescription('trait_2') | truncate(70, '..') }}
                                    <div class="chet-preview__updated-at">{{ formatDate(getAttributeUpdatedAt('trait_2')) }}</div>
                                </div>
                                <div class="mt-10 cursor-pointer text-color-dark font-semibold flex items-center"
                                     @click="selectAttributeInEdit('traits', 'trait_2', 'Select and explain character trait')">
                                    <span>View</span>
                                    <svg class="ml-4" xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9">
                                        <g fill="none" fill-rule="evenodd">
                                            <g fill="#4E4D4B" fill-rule="nonzero">
                                                <g>
                                                    <g>
                                                        <path d="M13.93 4.043c-.042-.108-.104-.206-.184-.29l-3.5-3.5c-.343-.342-.9-.342-1.242 0-.343.344-.343.9 0 1.243L11.016 3.5H.875C.392 3.5 0 3.892 0 4.375s.392.875.875.875h10.141L9.004 7.254c-.166.164-.26.388-.26.621 0 .233.094.457.26.621.164.166.388.26.621.26.233 0 .457-.094.621-.26l3.5-3.5c.08-.083.142-.181.184-.289.088-.213.088-.451 0-.664z" transform="translate(-274 -608) translate(186 427) translate(88 181)"/>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-10 block w-full"></div>

                    <div class="mt-8 grid grid-cols-2 gap-10">
                        <div class="flex flex-col">
                            <div>
                                <div class="flex justify-between items-center h-6">
                                    <div class="text-color-light text-sm uppercase label-default">Traits</div>
                                    <div v-if="attributeInEdit && attributeInEdit.field === 'trait_3'">Editing</div>
                                </div>
                                <div class="relative mt-2 bg-light p-10 chedit-box-border" :class="{'chedit-box-border_active': attributeInEdit && attributeInEdit.field === 'trait_3'}">

                                    <div class="label-default h-35px">Explain character trait</div>
                                    <div ref="preview_trait_3" class="mt-2 break-words h-100px">
                                        {{ getAttributeDescription('trait_3') | truncate(70, '..') }}
                                        <div class="chet-preview__updated-at">{{ formatDate(getAttributeUpdatedAt('trait_3')) }}</div>
                                    </div>
                                    <div class="mt-10 cursor-pointer text-color-dark font-semibold flex items-center"
                                         @click="selectAttributeInEdit('traits', 'trait_3', 'Select and explain character trait')">
                                        <span>View</span>
                                        <svg class="ml-4" xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9">
                                            <g fill="none" fill-rule="evenodd">
                                                <g fill="#4E4D4B" fill-rule="nonzero">
                                                    <g>
                                                        <g>
                                                            <path d="M13.93 4.043c-.042-.108-.104-.206-.184-.29l-3.5-3.5c-.343-.342-.9-.342-1.242 0-.343.344-.343.9 0 1.243L11.016 3.5H.875C.392 3.5 0 3.892 0 4.375s.392.875.875.875h10.141L9.004 7.254c-.166.164-.26.388-.26.621 0 .233.094.457.26.621.164.166.388.26.621.26.233 0 .457-.094.621-.26l3.5-3.5c.08-.083.142-.181.184-.289.088-.213.088-.451 0-.664z" transform="translate(-274 -608) translate(186 427) translate(88 181)"/>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>

                                </div>
                            </div>

                            <div class="mt-6">
                                <div class="flex justify-between items-center h-6">
                                    <div class="text-color-light text-sm uppercase label-default">Views</div>
                                    <div v-if="attributeInEdit && attributeInEdit.field === 'religion'">Editing</div>
                                </div>
                                <div class="relative mt-2 bg-light p-10 chedit-box-border" :class="{'chedit-box-border_active': attributeInEdit && attributeInEdit.field === 'religion'}">
                                    <div class="label-default h-35px">Do they have a religion?</div>
                                    <div ref="preview_religion" class="mt-2 break-words h-100px">
                                        {{ getAttributeDescription('religion') | truncate(70, '..') }}
                                        <div class="chet-preview__updated-at">{{ formatDate(getAttributeUpdatedAt('religion')) }}</div>
                                    </div>
                                    <div class="mt-10 cursor-pointer text-color-dark font-semibold flex items-center"
                                         @click="selectAttributeInEdit('views', 'religion', 'Do they have a religion? Explain their beliefs')">
                                        <span>View</span>
                                        <svg class="ml-4" xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9">
                                            <g fill="none" fill-rule="evenodd">
                                                <g fill="#4E4D4B" fill-rule="nonzero">
                                                    <g>
                                                        <g>
                                                            <path d="M13.93 4.043c-.042-.108-.104-.206-.184-.29l-3.5-3.5c-.343-.342-.9-.342-1.242 0-.343.344-.343.9 0 1.243L11.016 3.5H.875C.392 3.5 0 3.892 0 4.375s.392.875.875.875h10.141L9.004 7.254c-.166.164-.26.388-.26.621 0 .233.094.457.26.621.164.166.388.26.621.26.233 0 .457-.094.621-.26l3.5-3.5c.08-.083.142-.181.184-.289.088-.213.088-.451 0-.664z" transform="translate(-274 -608) translate(186 427) translate(88 181)"/>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col">

                                <div class="flex justify-between items-center h-6">
                                    <div class="text-color-light text-sm uppercase label-default">Views</div>
                                    <div v-if="attributeInEdit && attributeInEdit.field === 'optimistic'">Editing</div>
                                </div>
                                <div class="relative mt-2 bg-light p-10 flex flex-col justify-between chedit-box-border" :class="{'chedit-box-border_active': attributeInEdit && attributeInEdit.field === 'optimistic'}" style="height: 100%;">
                                    <div>
                                        <div class="label-default h-35px">Are they optimistic or pessimistic?</div>
                                        <div ref="preview_optimistic" class="mt-2 break-words h-100px">
                                            {{ getAttributeDescription('optimistic') | truncate(70, '..') }}
                                            <div class="chet-preview__updated-at">{{ formatDate(getAttributeUpdatedAt('optimistic')) }}</div>
                                        </div>
                                    </div>
                                    <div class="mt-10 cursor-pointer text-color-dark font-semibold flex items-center"
                                         @click="selectAttributeInEdit('views', 'optimistic', 'Are they optimistic or pessimistic? How do they view things?')">
                                        <span>View</span>
                                        <svg class="ml-4" xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9">
                                            <g fill="none" fill-rule="evenodd">
                                                <g fill="#4E4D4B" fill-rule="nonzero">
                                                    <g>
                                                        <g>
                                                            <path d="M13.93 4.043c-.042-.108-.104-.206-.184-.29l-3.5-3.5c-.343-.342-.9-.342-1.242 0-.343.344-.343.9 0 1.243L11.016 3.5H.875C.392 3.5 0 3.892 0 4.375s.392.875.875.875h10.141L9.004 7.254c-.166.164-.26.388-.26.621 0 .233.094.457.26.621.164.166.388.26.621.26.233 0 .457-.094.621-.26l3.5-3.5c.08-.083.142-.181.184-.289.088-.213.088-.451 0-.664z" transform="translate(-274 -608) translate(186 427) translate(88 181)"/>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                </div>

                        </div>
                    </div>

                    <div class="mt-10 block w-full"></div>

                    <div class="flex justify-between items-center h-6">
                        <div class="text-color-light text-sm uppercase label-default">Background</div>
                        <div v-if="attributeInEdit && attributeInEdit.field === 'background_1'">Editing</div>
                    </div>
                    <div class="relative mt-2 bg-light p-10 chedit-box-border" :class="{'chedit-box-border_active': attributeInEdit && attributeInEdit.field === 'background_1'}">
                        <div class="label-default h-35px">What social class do they sit in?</div>
                        <div ref="preview_background_1" class="mt-2 break-words h-100px">
                            {{ getAttributeDescription('background_1') | truncate(70, '..') }}
                            <div class="chet-preview__updated-at">{{ formatDate(getAttributeUpdatedAt('background_1')) }}</div>
                        </div>
                        <div class="mt-10 cursor-pointer text-color-dark font-semibold flex items-center"
                             @click="selectAttributeInEdit('background', 'background_1', 'What social class do they sit in?')">
                            <span>View</span>
                            <svg class="ml-4" xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9">
                                <g fill="none" fill-rule="evenodd">
                                    <g fill="#4E4D4B" fill-rule="nonzero">
                                        <g>
                                            <g>
                                                <path d="M13.93 4.043c-.042-.108-.104-.206-.184-.29l-3.5-3.5c-.343-.342-.9-.342-1.242 0-.343.344-.343.9 0 1.243L11.016 3.5H.875C.392 3.5 0 3.892 0 4.375s.392.875.875.875h10.141L9.004 7.254c-.166.164-.26.388-.26.621 0 .233.094.457.26.621.164.166.388.26.621.26.233 0 .457-.094.621-.26l3.5-3.5c.08-.083.142-.181.184-.289.088-.213.088-.451 0-.664z" transform="translate(-274 -608) translate(186 427) translate(88 181)"/>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>

                    <div class="mt-8 grid grid-cols-2 gap-10">
                        <div>
                            <div class="flex justify-between items-center h-6">
                                <div class="text-color-light text-sm uppercase label-default">Background</div>
                                <div v-if="attributeInEdit && attributeInEdit.field === 'background_2'">Editing</div>
                            </div>
                            <div class="relative mt-2 bg-light p-10 chedit-box-border" :class="{'chedit-box-border_active': attributeInEdit && attributeInEdit.field === 'background_2'}">
                                <div class="label-default h-35px">What kind of intelligence do they have?</div>
                                <div ref="preview_background_2" class="mt-2 break-words h-100px">
                                    {{ getAttributeDescription('background_2') | truncate(70, '..') }}
                                    <div class="chet-preview__updated-at">{{ formatDate(getAttributeUpdatedAt('background_2')) }}</div>
                                </div>
                                <div class="mt-10 cursor-pointer text-color-dark font-semibold flex items-center"
                                     @click="selectAttributeInEdit('background', 'background_2', 'What kind of intelligence do they have?')">
                                    <span>View</span>
                                    <svg class="ml-4" xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9">
                                        <g fill="none" fill-rule="evenodd">
                                            <g fill="#4E4D4B" fill-rule="nonzero">
                                                <g>
                                                    <g>
                                                        <path d="M13.93 4.043c-.042-.108-.104-.206-.184-.29l-3.5-3.5c-.343-.342-.9-.342-1.242 0-.343.344-.343.9 0 1.243L11.016 3.5H.875C.392 3.5 0 3.892 0 4.375s.392.875.875.875h10.141L9.004 7.254c-.166.164-.26.388-.26.621 0 .233.094.457.26.621.164.166.388.26.621.26.233 0 .457-.094.621-.26l3.5-3.5c.08-.083.142-.181.184-.289.088-.213.088-.451 0-.664z" transform="translate(-274 -608) translate(186 427) translate(88 181)"/>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between items-center h-6">
                                <div class="text-color-light text-sm uppercase label-default">Background</div>
                                <div v-if="attributeInEdit && attributeInEdit.field === 'background_3'">Editing</div>
                            </div>
                            <div class="relative mt-2 bg-light p-10 chedit-box-border" :class="{'chedit-box-border_active': attributeInEdit && attributeInEdit.field === 'background_3'}">
                                <div class="label-default h-35px">What education does your character have?</div>
                                <div ref="preview_background_3" class="mt-2 break-words h-100px">
                                    {{ getAttributeDescription('background_3') | truncate(70, '..') }}
                                    <div class="chet-preview__updated-at">{{ formatDate(getAttributeUpdatedAt('background_3')) }}</div>
                                </div>
                                <div class="mt-10 cursor-pointer text-color-dark font-semibold flex items-center"
                                     @click="selectAttributeInEdit('background', 'background_3', 'What education does your character have?')">
                                    <span>View</span>
                                    <svg class="ml-4" xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9">
                                        <g fill="none" fill-rule="evenodd">
                                            <g fill="#4E4D4B" fill-rule="nonzero">
                                                <g>
                                                    <g>
                                                        <path d="M13.93 4.043c-.042-.108-.104-.206-.184-.29l-3.5-3.5c-.343-.342-.9-.342-1.242 0-.343.344-.343.9 0 1.243L11.016 3.5H.875C.392 3.5 0 3.892 0 4.375s.392.875.875.875h10.141L9.004 7.254c-.166.164-.26.388-.26.621 0 .233.094.457.26.621.164.166.388.26.621.26.233 0 .457-.094.621-.26l3.5-3.5c.08-.083.142-.181.184-.289.088-.213.088-.451 0-.664z" transform="translate(-274 -608) translate(186 427) translate(88 181)"/>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-between items-center h-6">
                        <div class="text-color-light text-sm uppercase label-default">Background</div>
                        <div v-if="attributeInEdit && attributeInEdit.field === 'background_4'">Editing</div>
                    </div>
                    <div class="relative mt-2 bg-light p-10 chedit-box-border" :class="{'chedit-box-border_active': attributeInEdit && attributeInEdit.field === 'background_4'}">
                        <div class="label-default h-35px">What is their hometown and what was it like?</div>
                        <div ref="preview_background_4" class="mt-2 break-words h-100px">
                            {{ getAttributeDescription('background_4') | truncate(70, '..') }}
                            <div class="chet-preview__updated-at">{{ formatDate(getAttributeUpdatedAt('background_4')) }}</div>
                        </div>
                        <div class="mt-10 cursor-pointer text-color-dark font-semibold flex items-center"
                             @click="selectAttributeInEdit('background', 'background_4', 'What is their hometown and what was it like for them growing up? Describe their\n'+
'childhood and the effects it has on them. Do they have a favourite place?')">
                            <span>View</span>
                            <svg class="ml-4" xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9">
                                <g fill="none" fill-rule="evenodd">
                                    <g fill="#4E4D4B" fill-rule="nonzero">
                                        <g>
                                            <g>
                                                <path d="M13.93 4.043c-.042-.108-.104-.206-.184-.29l-3.5-3.5c-.343-.342-.9-.342-1.242 0-.343.344-.343.9 0 1.243L11.016 3.5H.875C.392 3.5 0 3.892 0 4.375s.392.875.875.875h10.141L9.004 7.254c-.166.164-.26.388-.26.621 0 .233.094.457.26.621.164.166.388.26.621.26.233 0 .457-.094.621-.26l3.5-3.5c.08-.083.142-.181.184-.289.088-.213.088-.451 0-.664z" transform="translate(-274 -608) translate(186 427) translate(88 181)"/>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>

                    <div class="mt-8 grid grid-cols-2 gap-10">
                        <div class="flex flex-col">
                            <div>
                                <div class="flex justify-between items-center h-6">
                                    <div class="text-color-light text-sm uppercase label-default">Background</div>
                                    <div v-if="attributeInEdit && attributeInEdit.field === 'background_5'">Editing</div>
                                </div>
                                <div class="relative mt-2 bg-light p-10 chedit-box-border" :class="{'chedit-box-border_active': attributeInEdit && attributeInEdit.field === 'background_5'}">
                                    <div class="label-default h-35px">What is their occupation?</div>
                                    <div ref="preview_background_5" class="mt-2 break-words h-100px">
                                        {{ getAttributeDescription('background_5') | truncate(70, '..') }}
                                        <div class="chet-preview__updated-at">{{ formatDate(getAttributeUpdatedAt('background_5')) }}</div>
                                    </div>
                                    <div class="mt-10 cursor-pointer text-color-dark font-semibold flex items-center"
                                         @click="selectAttributeInEdit('background', 'background_5', 'What is their occupation? What does their resume look like?')">
                                        <span>View</span>
                                        <svg class="ml-4" xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9">
                                            <g fill="none" fill-rule="evenodd">
                                                <g fill="#4E4D4B" fill-rule="nonzero">
                                                    <g>
                                                        <g>
                                                            <path d="M13.93 4.043c-.042-.108-.104-.206-.184-.29l-3.5-3.5c-.343-.342-.9-.342-1.242 0-.343.344-.343.9 0 1.243L11.016 3.5H.875C.392 3.5 0 3.892 0 4.375s.392.875.875.875h10.141L9.004 7.254c-.166.164-.26.388-.26.621 0 .233.094.457.26.621.164.166.388.26.621.26.233 0 .457-.094.621-.26l3.5-3.5c.08-.083.142-.181.184-.289.088-.213.088-.451 0-.664z" transform="translate(-274 -608) translate(186 427) translate(88 181)"/>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-8">
                                <div class="flex justify-between items-center h-6">
                                    <div class="text-color-light text-sm uppercase label-default">Relationships</div>
                                    <div v-if="attributeInEdit && attributeInEdit.field === 'relationship_1'">Editing</div>
                                </div>
                                <div class="relative mt-2 bg-light p-10 chedit-box-border" :class="{'chedit-box-border_active': attributeInEdit && attributeInEdit.field === 'relationship_1'}">
                                    <div class="label-default h-35px">Who is your characters family?</div>
                                    <div ref="preview_relationship_1" class="mt-2 break-words h-100px">
                                        {{ getAttributeDescription('relationship_1') | truncate(70, '..') }}
                                        <div class="chet-preview__updated-at">{{ formatDate(getAttributeUpdatedAt('relationship_1')) }}</div>
                                    </div>
                                    <div class="mt-10 cursor-pointer text-color-dark font-semibold flex items-center"
                                         @click="selectAttributeInEdit('relationships', 'relationship_1', 'Who is your characters family? What relationship do they have with them?')">
                                        <span>View</span>
                                        <svg class="ml-4" xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9">
                                            <g fill="none" fill-rule="evenodd">
                                                <g fill="#4E4D4B" fill-rule="nonzero">
                                                    <g>
                                                        <g>
                                                            <path d="M13.93 4.043c-.042-.108-.104-.206-.184-.29l-3.5-3.5c-.343-.342-.9-.342-1.242 0-.343.344-.343.9 0 1.243L11.016 3.5H.875C.392 3.5 0 3.892 0 4.375s.392.875.875.875h10.141L9.004 7.254c-.166.164-.26.388-.26.621 0 .233.094.457.26.621.164.166.388.26.621.26.233 0 .457-.094.621-.26l3.5-3.5c.08-.083.142-.181.184-.289.088-.213.088-.451 0-.664z" transform="translate(-274 -608) translate(186 427) translate(88 181)"/>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <div class="flex justify-between items-center h-6">
                                <div class="text-color-light text-sm uppercase label-default">Background</div>
                                <div v-if="attributeInEdit && attributeInEdit.field === 'background_6'">Editing</div>
                            </div>
                            <div class="relative mt-2 bg-light p-10 flex flex-col justify-between chedit-box-border" :class="{'chedit-box-border_active': attributeInEdit && attributeInEdit.field === 'background_6'}" style="height: 100%;">
                                <div>
                                    <div class="label-default h-35px">What are some major turning points?</div>
                                    <div ref="preview_background_6" class="mt-2 break-words h-100px">
                                        {{ getAttributeDescription('background_6') | truncate(70, '..') }}
                                        <div class="chet-preview__updated-at">{{ formatDate(getAttributeUpdatedAt('background_6')) }}</div>
                                    </div>
                                </div>
                                <div class="mt-10 cursor-pointer text-color-dark font-semibold flex items-center"
                                     @click="selectAttributeInEdit('background', 'background_6', 'What are some major turning points in your characters life? What events took place\n'+
'that influenced who they are today and their perceptions?')">
                                    <span>View</span>
                                    <svg class="ml-4" xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9">
                                        <g fill="none" fill-rule="evenodd">
                                            <g fill="#4E4D4B" fill-rule="nonzero">
                                                <g>
                                                    <g>
                                                        <path d="M13.93 4.043c-.042-.108-.104-.206-.184-.29l-3.5-3.5c-.343-.342-.9-.342-1.242 0-.343.344-.343.9 0 1.243L11.016 3.5H.875C.392 3.5 0 3.892 0 4.375s.392.875.875.875h10.141L9.004 7.254c-.166.164-.26.388-.26.621 0 .233.094.457.26.621.164.166.388.26.621.26.233 0 .457-.094.621-.26l3.5-3.5c.08-.083.142-.181.184-.289.088-.213.088-.451 0-.664z" transform="translate(-274 -608) translate(186 427) translate(88 181)"/>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 grid grid-cols-2 gap-10">
                        <div>
                            <div class="flex justify-between items-center h-6">
                                <div class="text-color-light text-sm uppercase label-default">Relationships</div>
                                <div v-if="attributeInEdit && attributeInEdit.field === 'relationship_2'">Editing</div>
                            </div>
                            <div class="relative mt-2 bg-light p-10 chedit-box-border" :class="{'chedit-box-border_active': attributeInEdit && attributeInEdit.field === 'relationship_2'}">
                                <div class="label-default h-35px">Who are your characters friends?</div>
                                <div ref="preview_relationship_2" class="mt-2 break-words h-100px">
                                    {{ getAttributeDescription('relationship_2') | truncate(70, '..') }}
                                    <div class="chet-preview__updated-at">{{ formatDate(getAttributeUpdatedAt('relationship_2')) }}</div>
                                </div>
                                <div class="mt-10 cursor-pointer text-color-dark font-semibold flex items-center"
                                     @click="selectAttributeInEdit('relationships', 'relationship_2', 'Who are your characters friends? How did they meet? What kind of relationship do\n'+
'they have?')">
                                    <span>View</span>
                                    <svg class="ml-4" xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9">
                                        <g fill="none" fill-rule="evenodd">
                                            <g fill="#4E4D4B" fill-rule="nonzero">
                                                <g>
                                                    <g>
                                                        <path d="M13.93 4.043c-.042-.108-.104-.206-.184-.29l-3.5-3.5c-.343-.342-.9-.342-1.242 0-.343.344-.343.9 0 1.243L11.016 3.5H.875C.392 3.5 0 3.892 0 4.375s.392.875.875.875h10.141L9.004 7.254c-.166.164-.26.388-.26.621 0 .233.094.457.26.621.164.166.388.26.621.26.233 0 .457-.094.621-.26l3.5-3.5c.08-.083.142-.181.184-.289.088-.213.088-.451 0-.664z" transform="translate(-274 -608) translate(186 427) translate(88 181)"/>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between items-center h-6">
                                <div class="text-color-light text-sm uppercase label-default">Relationships</div>
                                <div v-if="attributeInEdit && attributeInEdit.field === 'relationship_3'">Editing</div>
                            </div>
                            <div class="relative mt-2 bg-light p-10 chedit-box-border" :class="{'chedit-box-border_active': attributeInEdit && attributeInEdit.field === 'relationship_3'}">
                                <div class="label-default h-35px">Is your character in a relationship?</div>
                                <div ref="preview_relationship_3" class="mt-2 break-words h-100px">
                                    {{ getAttributeDescription('relationship_3') | truncate(70, '..') }}
                                    <div class="chet-preview__updated-at">{{ formatDate(getAttributeUpdatedAt('relationship_3')) }}</div>
                                </div>
                                <div class="mt-10 cursor-pointer text-color-dark font-semibold flex items-center"
                                     @click="selectAttributeInEdit('relationships', 'relationship_3', 'Is your character in a relationship with someone? How do they feel about\n'+
'relationships? Will there be a love interest? How will it make your character feel and\n'+
'act?')">
                                    <span>View</span>
                                    <svg class="ml-4" xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9">
                                        <g fill="none" fill-rule="evenodd">
                                            <g fill="#4E4D4B" fill-rule="nonzero">
                                                <g>
                                                    <g>
                                                        <path d="M13.93 4.043c-.042-.108-.104-.206-.184-.29l-3.5-3.5c-.343-.342-.9-.342-1.242 0-.343.344-.343.9 0 1.243L11.016 3.5H.875C.392 3.5 0 3.892 0 4.375s.392.875.875.875h10.141L9.004 7.254c-.166.164-.26.388-.26.621 0 .233.094.457.26.621.164.166.388.26.621.26.233 0 .457-.094.621-.26l3.5-3.5c.08-.083.142-.181.184-.289.088-.213.088-.451 0-.664z" transform="translate(-274 -608) translate(186 427) translate(88 181)"/>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-between items-center h-6">
                        <div class="text-color-light text-sm uppercase label-default">Relationships</div>
                        <div v-if="attributeInEdit && attributeInEdit.field === 'relationship_4'">Editing</div>
                    </div>
                    <div class="relative mt-2 bg-light p-10 chedit-box-border" :class="{'chedit-box-border_active': attributeInEdit && attributeInEdit.field === 'relationship_4'}">
                        <div class="label-default h-35px">Sexuality, who are they interested in?</div>
                        <div ref="preview_relationship_4" class="mt-2 break-words h-100px">
                            {{ getAttributeDescription('relationship_4') | truncate(70, '..') }}
                            <div class="chet-preview__updated-at">{{ formatDate(getAttributeUpdatedAt('relationship_4')) }}</div>
                        </div>
                        <div class="mt-10 cursor-pointer text-color-dark font-semibold flex items-center"
                             @click="selectAttributeInEdit('relationships', 'relationship_4', 'Sexuality, who are they interested in?')">
                            <span>View</span>
                            <svg class="ml-4" xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9">
                                <g fill="none" fill-rule="evenodd">
                                    <g fill="#4E4D4B" fill-rule="nonzero">
                                        <g>
                                            <g>
                                                <path d="M13.93 4.043c-.042-.108-.104-.206-.184-.29l-3.5-3.5c-.343-.342-.9-.342-1.242 0-.343.344-.343.9 0 1.243L11.016 3.5H.875C.392 3.5 0 3.892 0 4.375s.392.875.875.875h10.141L9.004 7.254c-.166.164-.26.388-.26.621 0 .233.094.457.26.621.164.166.388.26.621.26.233 0 .457-.094.621-.26l3.5-3.5c.08-.083.142-.181.184-.289.088-.213.088-.451 0-.664z" transform="translate(-274 -608) translate(186 427) translate(88 181)"/>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>

                    <div class="mt-10 block w-full"></div>

                    <div class="mt-8 grid grid-cols-2 gap-10">
                        <div>
                            <div class="flex justify-between items-center h-6">
                                <div class="text-color-light text-sm uppercase label-default">Struggles</div>
                                <div v-if="attributeInEdit && attributeInEdit.field === 'struggles_1'">Editing</div>
                            </div>
                            <div class="relative mt-2 bg-light p-10 chedit-box-border" :class="{'chedit-box-border_active': attributeInEdit && attributeInEdit.field === 'struggles_1'}">
                                <div class="label-default h-35px">What are your characters insecurities?</div>
                                <div ref="preview_struggles_1" class="mt-2 break-words h-100px">
                                    {{ getAttributeDescription('struggles_1') | truncate(70, '..') }}
                                    <div class="chet-preview__updated-at">{{ formatDate(getAttributeUpdatedAt('struggles_1')) }}</div>
                                </div>
                                <div class="mt-10 cursor-pointer text-color-dark font-semibold flex items-center"
                                     @click="selectAttributeInEdit('struggles', 'struggles_1', 'What are your characters insecurities?')">
                                    <span>View</span>
                                    <svg class="ml-4" xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9">
                                        <g fill="none" fill-rule="evenodd">
                                            <g fill="#4E4D4B" fill-rule="nonzero">
                                                <g>
                                                    <g>
                                                        <path d="M13.93 4.043c-.042-.108-.104-.206-.184-.29l-3.5-3.5c-.343-.342-.9-.342-1.242 0-.343.344-.343.9 0 1.243L11.016 3.5H.875C.392 3.5 0 3.892 0 4.375s.392.875.875.875h10.141L9.004 7.254c-.166.164-.26.388-.26.621 0 .233.094.457.26.621.164.166.388.26.621.26.233 0 .457-.094.621-.26l3.5-3.5c.08-.083.142-.181.184-.289.088-.213.088-.451 0-.664z" transform="translate(-274 -608) translate(186 427) translate(88 181)"/>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between items-center h-6">
                                <div class="text-color-light text-sm uppercase label-default">Struggles</div>
                                <div v-if="attributeInEdit && attributeInEdit.field === 'struggles_2'">Editing</div>
                            </div>
                            <div class="relative mt-2 bg-light p-10 chedit-box-border" :class="{'chedit-box-border_active': attributeInEdit && attributeInEdit.field === 'struggles_2'}">
                                <div class="label-default h-35px">Biggest fear</div>
                                <div ref="preview_struggles_2" class="mt-2 break-words h-100px">
                                    {{ getAttributeDescription('struggles_2') | truncate(70, '..') }}
                                    <div class="chet-preview__updated-at">{{ formatDate(getAttributeUpdatedAt('struggles_2')) }}</div>
                                </div>
                                <div class="mt-10 cursor-pointer text-color-dark font-semibold flex items-center"
                                     @click="selectAttributeInEdit('struggles', 'struggles_2', 'Biggest fear. What does your character fear the most, big or small? What, if needed to\n'+
'be confronted - would keep them up at night?')">
                                    <span>View</span>
                                    <svg class="ml-4" xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9">
                                        <g fill="none" fill-rule="evenodd">
                                            <g fill="#4E4D4B" fill-rule="nonzero">
                                                <g>
                                                    <g>
                                                        <path d="M13.93 4.043c-.042-.108-.104-.206-.184-.29l-3.5-3.5c-.343-.342-.9-.342-1.242 0-.343.344-.343.9 0 1.243L11.016 3.5H.875C.392 3.5 0 3.892 0 4.375s.392.875.875.875h10.141L9.004 7.254c-.166.164-.26.388-.26.621 0 .233.094.457.26.621.164.166.388.26.621.26.233 0 .457-.094.621-.26l3.5-3.5c.08-.083.142-.181.184-.289.088-.213.088-.451 0-.664z" transform="translate(-274 -608) translate(186 427) translate(88 181)"/>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-between items-center h-6">
                        <div class="text-color-light text-sm uppercase label-default">Struggles</div>
                        <div v-if="attributeInEdit && attributeInEdit.field === 'struggles_3'">Editing</div>
                    </div>
                    <div class="relative mt-2 bg-light p-10 chedit-box-border" :class="{'chedit-box-border_active': attributeInEdit && attributeInEdit.field === 'struggles_3'}">
                        <div class="label-default h-35px">Saddest memory</div>
                        <div ref="preview_struggles_3" class="mt-2 break-words h-100px">
                            {{ getAttributeDescription('struggles_3') | truncate(70, '..') }}
                            <div class="chet-preview__updated-at">{{ formatDate(getAttributeUpdatedAt('struggles_3')) }}</div>
                        </div>
                        <div class="mt-10 cursor-pointer text-color-dark font-semibold flex items-center"
                             @click="selectAttributeInEdit('struggles', 'struggles_3', 'Saddest memory. What memory do they hold close to their heart and wish never to feel that pain again? What memory tore them up? Describe why it made them feel the way that it did.')">
                            <span>View</span>
                            <svg class="ml-4" xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9">
                                <g fill="none" fill-rule="evenodd">
                                    <g fill="#4E4D4B" fill-rule="nonzero">
                                        <g>
                                            <g>
                                                <path d="M13.93 4.043c-.042-.108-.104-.206-.184-.29l-3.5-3.5c-.343-.342-.9-.342-1.242 0-.343.344-.343.9 0 1.243L11.016 3.5H.875C.392 3.5 0 3.892 0 4.375s.392.875.875.875h10.141L9.004 7.254c-.166.164-.26.388-.26.621 0 .233.094.457.26.621.164.166.388.26.621.26.233 0 .457-.094.621-.26l3.5-3.5c.08-.083.142-.181.184-.289.088-.213.088-.451 0-.664z" transform="translate(-274 -608) translate(186 427) translate(88 181)"/>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>

                    <div class="mt-8 grid grid-cols-2 gap-10">
                        <div>
                            <div class="flex justify-between items-center h-6">
                                <div class="text-color-light text-sm uppercase label-default">Struggles</div>
                                <div v-if="attributeInEdit && attributeInEdit.field === 'struggles_4'">Editing</div>
                            </div>
                            <div class="relative mt-2 bg-light p-10 chedit-box-border" :class="{'chedit-box-border_active': attributeInEdit && attributeInEdit.field === 'struggles_4'}">
                                <div class="label-default h-35px">What is your characters greatest regret?</div>
                                <div ref="preview_struggles_4" class="mt-2 break-words h-100px">
                                    {{ getAttributeDescription('struggles_4') | truncate(70, '..') }}
                                    <div class="chet-preview__updated-at">{{ formatDate(getAttributeUpdatedAt('struggles_4')) }}</div>
                                </div>
                                <div class="mt-10 cursor-pointer text-color-dark font-semibold flex items-center"
                                     @click="selectAttributeInEdit('struggles', 'struggles_4', 'What is your characters greatest regret? What do they wish they could go back in time and do differently?')">
                                    <span>View</span>
                                    <svg class="ml-4" xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9">
                                        <g fill="none" fill-rule="evenodd">
                                            <g fill="#4E4D4B" fill-rule="nonzero">
                                                <g>
                                                    <g>
                                                        <path d="M13.93 4.043c-.042-.108-.104-.206-.184-.29l-3.5-3.5c-.343-.342-.9-.342-1.242 0-.343.344-.343.9 0 1.243L11.016 3.5H.875C.392 3.5 0 3.892 0 4.375s.392.875.875.875h10.141L9.004 7.254c-.166.164-.26.388-.26.621 0 .233.094.457.26.621.164.166.388.26.621.26.233 0 .457-.094.621-.26l3.5-3.5c.08-.083.142-.181.184-.289.088-.213.088-.451 0-.664z" transform="translate(-274 -608) translate(186 427) translate(88 181)"/>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between items-center h-6">
                                <div class="text-color-light text-sm uppercase label-default">Struggles</div>
                                <div v-if="attributeInEdit && attributeInEdit.field === 'struggles_5'">Editing</div>
                            </div>
                            <div class="relative mt-2 bg-light p-10 chedit-box-border" :class="{'chedit-box-border_active': attributeInEdit && attributeInEdit.field === 'struggles_5'}">
                                <div class="label-default h-35px">What secrets is your character holding?</div>
                                <div ref="preview_struggles_5" class="mt-2 break-words h-100px">
                                    {{ getAttributeDescription('struggles_5') | truncate(70, '..') }}
                                    <div class="chet-preview__updated-at">{{ formatDate(getAttributeUpdatedAt('struggles_5')) }}</div>
                                </div>
                                <div class="mt-10 cursor-pointer text-color-dark font-semibold flex items-center"
                                     @click="selectAttributeInEdit('struggles', 'struggles_5', 'What secrets is your character holding? From what characters are they hiding the truth?')">
                                    <span>View</span>
                                    <svg class="ml-4" xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9">
                                        <g fill="none" fill-rule="evenodd">
                                            <g fill="#4E4D4B" fill-rule="nonzero">
                                                <g>
                                                    <g>
                                                        <path d="M13.93 4.043c-.042-.108-.104-.206-.184-.29l-3.5-3.5c-.343-.342-.9-.342-1.242 0-.343.344-.343.9 0 1.243L11.016 3.5H.875C.392 3.5 0 3.892 0 4.375s.392.875.875.875h10.141L9.004 7.254c-.166.164-.26.388-.26.621 0 .233.094.457.26.621.164.166.388.26.621.26.233 0 .457-.094.621-.26l3.5-3.5c.08-.083.142-.181.184-.289.088-.213.088-.451 0-.664z" transform="translate(-274 -608) translate(186 427) translate(88 181)"/>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-between items-center h-6">
                        <div class="text-color-light text-sm uppercase label-default">Strengths</div>
                        <div v-if="attributeInEdit && attributeInEdit.field === 'strengths_1'">Editing</div>
                    </div>
                    <div class="relative mt-2 bg-light p-10 chedit-box-border" :class="{'chedit-box-border_active': attributeInEdit && attributeInEdit.field === 'strengths_1'}">
                        <div class="label-default h-35px">What are they good at?</div>
                        <div ref="preview_strengths_1" class="mt-2 break-words h-100px">
                            {{ getAttributeDescription('strengths_1') | truncate(70, '..') }}
                            <div class="chet-preview__updated-at">{{ formatDate(getAttributeUpdatedAt('strengths_1')) }}</div>
                        </div>
                        <div class="mt-10 cursor-pointer text-color-dark font-semibold flex items-center"
                             @click="selectAttributeInEdit('strengths', 'strengths_1', 'What are they good at? Good or bad, where do they excel?')">
                            <span>View</span>
                            <svg class="ml-4" xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9">
                                <g fill="none" fill-rule="evenodd">
                                    <g fill="#4E4D4B" fill-rule="nonzero">
                                        <g>
                                            <g>
                                                <path d="M13.93 4.043c-.042-.108-.104-.206-.184-.29l-3.5-3.5c-.343-.342-.9-.342-1.242 0-.343.344-.343.9 0 1.243L11.016 3.5H.875C.392 3.5 0 3.892 0 4.375s.392.875.875.875h10.141L9.004 7.254c-.166.164-.26.388-.26.621 0 .233.094.457.26.621.164.166.388.26.621.26.233 0 .457-.094.621-.26l3.5-3.5c.08-.083.142-.181.184-.289.088-.213.088-.451 0-.664z" transform="translate(-274 -608) translate(186 427) translate(88 181)"/>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>

                    <div class="mt-8 grid grid-cols-2 gap-10">
                        <div>
                            <div class="flex justify-between items-center h-6">
                                <div class="text-color-light text-sm uppercase label-default">Strengths</div>
                                <div v-if="attributeInEdit && attributeInEdit.field === 'strengths_2'">Editing</div>
                            </div>
                            <div class="relative mt-2 bg-light p-10 chedit-box-border" :class="{'chedit-box-border_active': attributeInEdit && attributeInEdit.field === 'strengths_2'}">
                                <div class="label-default h-35px">What memory brings joy to their heart instantly?</div>
                                <div ref="preview_strengths_2" class="mt-2 break-words h-100px">
                                    {{ getAttributeDescription('strengths_2') | truncate(70, '..') }}
                                    <div class="chet-preview__updated-at">{{ formatDate(getAttributeUpdatedAt('strengths_2')) }}</div>
                                </div>
                                <div class="mt-10 cursor-pointer text-color-dark font-semibold flex items-center"
                                     @click="selectAttributeInEdit('strengths', 'strengths_2', 'What memory brings joy to their heart instantly? Describe a time where they felt their most happiest and how they remember it.')">
                                    <span>View</span>
                                    <svg class="ml-4" xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9">
                                        <g fill="none" fill-rule="evenodd">
                                            <g fill="#4E4D4B" fill-rule="nonzero">
                                                <g>
                                                    <g>
                                                        <path d="M13.93 4.043c-.042-.108-.104-.206-.184-.29l-3.5-3.5c-.343-.342-.9-.342-1.242 0-.343.344-.343.9 0 1.243L11.016 3.5H.875C.392 3.5 0 3.892 0 4.375s.392.875.875.875h10.141L9.004 7.254c-.166.164-.26.388-.26.621 0 .233.094.457.26.621.164.166.388.26.621.26.233 0 .457-.094.621-.26l3.5-3.5c.08-.083.142-.181.184-.289.088-.213.088-.451 0-.664z" transform="translate(-274 -608) translate(186 427) translate(88 181)"/>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between items-center h-6">
                                <div class="text-color-light text-sm uppercase label-default">Strengths</div>
                                <div v-if="attributeInEdit && attributeInEdit.field === 'strengths_3'">Editing</div>
                            </div>
                            <div class="relative mt-2 bg-light p-10 chedit-box-border" :class="{'chedit-box-border_active': attributeInEdit && attributeInEdit.field === 'strengths_3'}">
                                <div class="label-default h-35px">What are their hobbies?</div>
                                <div ref="preview_strengths_3" class="mt-2 break-words h-100px">
                                    {{ getAttributeDescription('strengths_3') | truncate(70, '..') }}
                                    <div class="chet-preview__updated-at">{{ formatDate(getAttributeUpdatedAt('strengths_3')) }}</div>
                                </div>
                                <div class="mt-10 cursor-pointer text-color-dark font-semibold flex items-center"
                                     @click="selectAttributeInEdit('strengths', 'strengths_3', 'What are their hobbies? What do they do for fun?')">
                                    <span>View</span>
                                    <svg class="ml-4" xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9">
                                        <g fill="none" fill-rule="evenodd">
                                            <g fill="#4E4D4B" fill-rule="nonzero">
                                                <g>
                                                    <g>
                                                        <path d="M13.93 4.043c-.042-.108-.104-.206-.184-.29l-3.5-3.5c-.343-.342-.9-.342-1.242 0-.343.344-.343.9 0 1.243L11.016 3.5H.875C.392 3.5 0 3.892 0 4.375s.392.875.875.875h10.141L9.004 7.254c-.166.164-.26.388-.26.621 0 .233.094.457.26.621.164.166.388.26.621.26.233 0 .457-.094.621-.26l3.5-3.5c.08-.083.142-.181.184-.289.088-.213.088-.451 0-.664z" transform="translate(-274 -608) translate(186 427) translate(88 181)"/>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

<!--                    Goals -->

                    <div class="mt-8 grid grid-cols-2 gap-10">
                        <div>
                            <div class="flex justify-between items-center h-6">
                                <div class="text-color-light text-sm uppercase label-default">Goal</div>
                                <div v-if="attributeInEdit && attributeInEdit.field === 'goal_1'">Editing</div>
                            </div>
                            <div class="relative mt-2 bg-light p-10 chedit-box-border" :class="{'chedit-box-border_active': attributeInEdit && attributeInEdit.field === 'goal_1'}">
                                <div class="label-default h-35px">What is their goal?</div>
                                <div ref="preview_goal_1" class="mt-2 break-words h-100px">
                                    {{ getAttributeDescription('goal_1') | truncate(70, '..') }}
                                    <div class="chet-preview__updated-at">{{ formatDate(getAttributeUpdatedAt('goal_1')) }}</div>
                                </div>
                                <div class="mt-10 cursor-pointer text-color-dark font-semibold flex items-center"
                                     @click="selectAttributeInEdit('goal', 'goal_1', 'What is their goal? What do they want?')">
                                    <span>View</span>
                                    <svg class="ml-4" xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9">
                                        <g fill="none" fill-rule="evenodd">
                                            <g fill="#4E4D4B" fill-rule="nonzero">
                                                <g>
                                                    <g>
                                                        <path d="M13.93 4.043c-.042-.108-.104-.206-.184-.29l-3.5-3.5c-.343-.342-.9-.342-1.242 0-.343.344-.343.9 0 1.243L11.016 3.5H.875C.392 3.5 0 3.892 0 4.375s.392.875.875.875h10.141L9.004 7.254c-.166.164-.26.388-.26.621 0 .233.094.457.26.621.164.166.388.26.621.26.233 0 .457-.094.621-.26l3.5-3.5c.08-.083.142-.181.184-.289.088-.213.088-.451 0-.664z" transform="translate(-274 -608) translate(186 427) translate(88 181)"/>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between items-center h-6">
                                <div class="text-color-light text-sm uppercase label-default">Goal</div>
                                <div v-if="attributeInEdit && attributeInEdit.field === 'goal_2'">Editing</div>
                            </div>
                            <div class="relative mt-2 bg-light p-10 chedit-box-border" :class="{'chedit-box-border_active': attributeInEdit && attributeInEdit.field === 'goal_2'}">
                                <div class="label-default h-35px">Why does your character want it?</div>
                                <div ref="preview_goal_2" class="mt-2 break-words h-100px">
                                    {{ getAttributeDescription('goal_2') | truncate(70, '..') }}
                                    <div class="chet-preview__updated-at">{{ formatDate(getAttributeUpdatedAt('goal_2')) }}</div>
                                </div>
                                <div class="mt-10 cursor-pointer text-color-dark font-semibold flex items-center"
                                     @click="selectAttributeInEdit('goal', 'goal_2', 'Why does your character want it? Why is it their goal? How would it make them feel to have it? How do they feel without it?')">
                                    <span>View</span>
                                    <svg class="ml-4" xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9">
                                        <g fill="none" fill-rule="evenodd">
                                            <g fill="#4E4D4B" fill-rule="nonzero">
                                                <g>
                                                    <g>
                                                        <path d="M13.93 4.043c-.042-.108-.104-.206-.184-.29l-3.5-3.5c-.343-.342-.9-.342-1.242 0-.343.344-.343.9 0 1.243L11.016 3.5H.875C.392 3.5 0 3.892 0 4.375s.392.875.875.875h10.141L9.004 7.254c-.166.164-.26.388-.26.621 0 .233.094.457.26.621.164.166.388.26.621.26.233 0 .457-.094.621-.26l3.5-3.5c.08-.083.142-.181.184-.289.088-.213.088-.451 0-.664z" transform="translate(-274 -608) translate(186 427) translate(88 181)"/>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 grid grid-cols-2 gap-10">
                        <div>
                            <div class="flex justify-between items-center h-6">
                                <div class="text-color-light text-sm uppercase label-default">Goal</div>
                                <div v-if="attributeInEdit && attributeInEdit.field === 'goal_3'">Editing</div>
                            </div>
                            <div class="relative mt-2 bg-light p-10 chedit-box-border" :class="{'chedit-box-border_active': attributeInEdit && attributeInEdit.field === 'goal_3'}">
                                <div class="label-default h-35px">What is the reason they don't have what they want?</div>
                                <div ref="preview_goal_3" class="mt-2 break-words h-100px">
                                    {{ getAttributeDescription('goal_3') | truncate(70, '..') }}
                                    <div class="chet-preview__updated-at">{{ formatDate(getAttributeUpdatedAt('goal_3')) }}</div>
                                </div>
                                <div class="mt-10 cursor-pointer text-color-dark font-semibold flex items-center"
                                     @click="selectAttributeInEdit('goal', 'goal_3', 'What is the reason they don\'t have what they want? Have they tried before and failed? Is it a new opportunity?')">
                                    <span>View</span>
                                    <svg class="ml-4" xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9">
                                        <g fill="none" fill-rule="evenodd">
                                            <g fill="#4E4D4B" fill-rule="nonzero">
                                                <g>
                                                    <g>
                                                        <path d="M13.93 4.043c-.042-.108-.104-.206-.184-.29l-3.5-3.5c-.343-.342-.9-.342-1.242 0-.343.344-.343.9 0 1.243L11.016 3.5H.875C.392 3.5 0 3.892 0 4.375s.392.875.875.875h10.141L9.004 7.254c-.166.164-.26.388-.26.621 0 .233.094.457.26.621.164.166.388.26.621.26.233 0 .457-.094.621-.26l3.5-3.5c.08-.083.142-.181.184-.289.088-.213.088-.451 0-.664z" transform="translate(-274 -608) translate(186 427) translate(88 181)"/>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between items-center h-6">
                                <div class="text-color-light text-sm uppercase label-default">Goal</div>
                                <div v-if="attributeInEdit && attributeInEdit.field === 'goal_4'">Editing</div>
                            </div>
                            <div class="relative mt-2 bg-light p-10 chedit-box-border" :class="{'chedit-box-border_active': attributeInEdit && attributeInEdit.field === 'goal_4'}">
                                <div class="label-default h-35px">How far will they go?</div>
                                <div ref="preview_goal_4" class="mt-2 break-words h-100px">
                                    {{ getAttributeDescription('goal_4') | truncate(70, '..') }}
                                    <div class="chet-preview__updated-at">{{ formatDate(getAttributeUpdatedAt('goal_4')) }}</div>
                                </div>
                                <div class="mt-10 cursor-pointer text-color-dark font-semibold flex items-center"
                                     @click="selectAttributeInEdit('goal', 'goal_4', 'How far will they go? What will they sacrifice to obtain it? Time? Their life? Relationships? Money?')">
                                    <span>View</span>
                                    <svg class="ml-4" xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9">
                                        <g fill="none" fill-rule="evenodd">
                                            <g fill="#4E4D4B" fill-rule="nonzero">
                                                <g>
                                                    <g>
                                                        <path d="M13.93 4.043c-.042-.108-.104-.206-.184-.29l-3.5-3.5c-.343-.342-.9-.342-1.242 0-.343.344-.343.9 0 1.243L11.016 3.5H.875C.392 3.5 0 3.892 0 4.375s.392.875.875.875h10.141L9.004 7.254c-.166.164-.26.388-.26.621 0 .233.094.457.26.621.164.166.388.26.621.26.233 0 .457-.094.621-.26l3.5-3.5c.08-.083.142-.181.184-.289.088-.213.088-.451 0-.664z" transform="translate(-274 -608) translate(186 427) translate(88 181)"/>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-between items-center h-6">
                        <div class="text-color-light text-sm uppercase label-default">Journey</div>
                        <div v-if="attributeInEdit && attributeInEdit.field === 'journey_1'">Editing</div>
                    </div>
                    <div class="relative mt-2 bg-light p-10 chedit-box-border" :class="{'chedit-box-border_active': attributeInEdit && attributeInEdit.field === 'journey_1'}">
                        <div class="label-default h-35px">What do they do to get what they want?</div>
                        <div ref="preview_journey_1" class="mt-2 break-words h-100px">
                            {{ getAttributeDescription('journey_1') | truncate(70, '..') }}
                            <div class="chet-preview__updated-at">{{ formatDate(getAttributeUpdatedAt('journey_1')) }}</div>
                        </div>
                        <div class="mt-10 cursor-pointer text-color-dark font-semibold flex items-center"
                             @click="selectAttributeInEdit('journey', 'journey_1', 'What do they do to get what they want?')">
                            <span>View</span>
                            <svg class="ml-4" xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9">
                                <g fill="none" fill-rule="evenodd">
                                    <g fill="#4E4D4B" fill-rule="nonzero">
                                        <g>
                                            <g>
                                                <path d="M13.93 4.043c-.042-.108-.104-.206-.184-.29l-3.5-3.5c-.343-.342-.9-.342-1.242 0-.343.344-.343.9 0 1.243L11.016 3.5H.875C.392 3.5 0 3.892 0 4.375s.392.875.875.875h10.141L9.004 7.254c-.166.164-.26.388-.26.621 0 .233.094.457.26.621.164.166.388.26.621.26.233 0 .457-.094.621-.26l3.5-3.5c.08-.083.142-.181.184-.289.088-.213.088-.451 0-.664z" transform="translate(-274 -608) translate(186 427) translate(88 181)"/>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-between items-center h-6">
                        <div class="text-color-light text-sm uppercase label-default">Journey</div>
                        <div v-if="attributeInEdit && attributeInEdit.field === 'journey_2'">Editing</div>
                    </div>
                    <div class="relative mt-2 bg-light p-10 chedit-box-border" :class="{'chedit-box-border_active': attributeInEdit && attributeInEdit.field === 'journey_2'}">
                        <div class="label-default h-35px">What implications does it cause?</div>
                        <div ref="preview_journey_2" class="mt-2 break-words h-100px">
                            {{ getAttributeDescription('journey_2') | truncate(70, '..') }}
                            <div class="chet-preview__updated-at">{{ formatDate(getAttributeUpdatedAt('journey_2')) }}</div>
                        </div>
                        <div class="mt-10 cursor-pointer text-color-dark font-semibold flex items-center"
                             @click="selectAttributeInEdit('journey', 'journey_2', 'What implications does it cause?')">
                            <span>View</span>
                            <svg class="ml-4" xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9">
                                <g fill="none" fill-rule="evenodd">
                                    <g fill="#4E4D4B" fill-rule="nonzero">
                                        <g>
                                            <g>
                                                <path d="M13.93 4.043c-.042-.108-.104-.206-.184-.29l-3.5-3.5c-.343-.342-.9-.342-1.242 0-.343.344-.343.9 0 1.243L11.016 3.5H.875C.392 3.5 0 3.892 0 4.375s.392.875.875.875h10.141L9.004 7.254c-.166.164-.26.388-.26.621 0 .233.094.457.26.621.164.166.388.26.621.26.233 0 .457-.094.621-.26l3.5-3.5c.08-.083.142-.181.184-.289.088-.213.088-.451 0-.664z" transform="translate(-274 -608) translate(186 427) translate(88 181)"/>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>

                    <div class="mt-8 grid grid-cols-2 gap-10">
                        <div>
                            <div class="flex justify-between items-center h-6">
                                <div class="text-color-light text-sm uppercase label-default">Journey</div>
                                <div v-if="attributeInEdit && attributeInEdit.field === 'journey_3'">Editing</div>
                            </div>
                            <div class="relative mt-2 bg-light p-10 chedit-box-border" :class="{'chedit-box-border_active': attributeInEdit && attributeInEdit.field === 'journey_3'}">
                                <div class="label-default h-35px">Is the result good, bad or both?</div>
                                <div ref="preview_journey_3" class="mt-2 break-words h-100px">
                                    {{ getAttributeDescription('journey_3') | truncate(70, '..') }}
                                    <div class="chet-preview__updated-at">{{ formatDate(getAttributeUpdatedAt('journey_3')) }}</div>
                                </div>
                                <div class="mt-10 cursor-pointer text-color-dark font-semibold flex items-center"
                                     @click="selectAttributeInEdit('journey', 'journey_3', 'Is the result good, bad or both?')">
                                    <span>View</span>
                                    <svg class="ml-4" xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9">
                                        <g fill="none" fill-rule="evenodd">
                                            <g fill="#4E4D4B" fill-rule="nonzero">
                                                <g>
                                                    <g>
                                                        <path d="M13.93 4.043c-.042-.108-.104-.206-.184-.29l-3.5-3.5c-.343-.342-.9-.342-1.242 0-.343.344-.343.9 0 1.243L11.016 3.5H.875C.392 3.5 0 3.892 0 4.375s.392.875.875.875h10.141L9.004 7.254c-.166.164-.26.388-.26.621 0 .233.094.457.26.621.164.166.388.26.621.26.233 0 .457-.094.621-.26l3.5-3.5c.08-.083.142-.181.184-.289.088-.213.088-.451 0-.664z" transform="translate(-274 -608) translate(186 427) translate(88 181)"/>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="flex justify-between items-center h-6">
                                <div class="text-color-light text-sm uppercase label-default">Journey</div>
                                <div v-if="attributeInEdit && attributeInEdit.field === 'journey_4'">Editing</div>
                            </div>
                            <div class="relative mt-2 bg-light p-10 chedit-box-border" :class="{'chedit-box-border_active': attributeInEdit && attributeInEdit.field === 'journey_4'}">
                                <div class="label-default h-35px">Are they happy with the outcome?</div>
                                <div ref="preview_journey_4" class="mt-2 break-words h-100px">
                                    {{ getAttributeDescription('journey_4') | truncate(70, '..') }}
                                    <div class="chet-preview__updated-at">{{ formatDate(getAttributeUpdatedAt('journey_4')) }}</div>
                                </div>
                                <div class="mt-10 cursor-pointer text-color-dark font-semibold flex items-center"
                                     @click="selectAttributeInEdit('journey', 'journey_4', 'Are they happy with the outcome?')">
                                    <span>View</span>
                                    <svg class="ml-4" xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9">
                                        <g fill="none" fill-rule="evenodd">
                                            <g fill="#4E4D4B" fill-rule="nonzero">
                                                <g>
                                                    <g>
                                                        <path d="M13.93 4.043c-.042-.108-.104-.206-.184-.29l-3.5-3.5c-.343-.342-.9-.342-1.242 0-.343.344-.343.9 0 1.243L11.016 3.5H.875C.392 3.5 0 3.892 0 4.375s.392.875.875.875h10.141L9.004 7.254c-.166.164-.26.388-.26.621 0 .233.094.457.26.621.164.166.388.26.621.26.233 0 .457-.094.621-.26l3.5-3.5c.08-.083.142-.181.184-.289.088-.213.088-.451 0-.664z" transform="translate(-274 -608) translate(186 427) translate(88 181)"/>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-between items-center h-6">
                        <div class="text-color-light text-sm uppercase label-default">Notes</div>
                        <div v-if="attributeInEdit && attributeInEdit.field === 'notes_1'">Editing</div>
                    </div>
                    <div class="relative mt-2 bg-light p-10 chedit-box-border" :class="{'chedit-box-border_active': attributeInEdit && attributeInEdit.field === 'notes_1'}">
                        <div class="label-default h-35px">Content</div>
                        <div ref="preview_notes_1" class="mt-2 break-words h-100px">
                            {{ getAttributeDescription('notes_1') | truncate(70, '..') }}
                            <div class="chet-preview__updated-at">{{ formatDate(getAttributeUpdatedAt('notes_1')) }}</div>
                        </div>
                        <div class="mt-10 cursor-pointer text-color-dark font-semibold flex items-center"
                             @click="selectAttributeInEdit('notes', 'notes_1', 'Write something')">
                            <span>View</span>
                            <svg class="ml-4" xmlns="http://www.w3.org/2000/svg" width="14" height="9" viewBox="0 0 14 9">
                                <g fill="none" fill-rule="evenodd">
                                    <g fill="#4E4D4B" fill-rule="nonzero">
                                        <g>
                                            <g>
                                                <path d="M13.93 4.043c-.042-.108-.104-.206-.184-.29l-3.5-3.5c-.343-.342-.9-.342-1.242 0-.343.344-.343.9 0 1.243L11.016 3.5H.875C.392 3.5 0 3.892 0 4.375s.392.875.875.875h10.141L9.004 7.254c-.166.164-.26.388-.26.621 0 .233.094.457.26.621.164.166.388.26.621.26.233 0 .457-.094.621-.26l3.5-3.5c.08-.083.142-.181.184-.289.088-.213.088-.451 0-.664z" transform="translate(-274 -608) translate(186 427) translate(88 181)"/>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>

                </div>

                <div class="px-6 xl:px-12" v-if="attributeInEdit !== null">
                    <div class="che-rt-block">
                        <div></div>
                        <div class="label-default">{{ attributeInEdit.group }}</div>
                        <div class="mt-2 p-4 border border-gray-300" style="height: 92.8vh;">
                            <div class="bg-light p-10" style="height: 90vh;">
                                <div v-if="attributeInEdit.group === 'physicality'">
                                    <div class="flex items-center mr-4">
                                        <div class="flex flex-wrap items-center">
                                            <img ref="preview_input_physicality_image" v-if="getAttributeValue('image', 'physicality') === undefined" src="/storage/undefined-oval.png" width="84px" height="84px" alt="photo" style="height: 84px;" class="rounded-full">
                                            <img ref="preview_input_physicality_image" v-if="getAttributeValue('image', 'physicality') !== undefined" :src="generateStorageUrl(getAttributeValue('image', 'physicality'))" width="84px" height="84px" alt="photo" style="height: 84px;" class="rounded-full">
                                            <input ref="input_physicality_image" type="file" class="hidden" @change="updateCharacterAttribute({ group: attributeInEdit.group, field: 'image', value: $event.target.files[0] })">

<!--                                            <div class="ml-0 xl:ml-8 hidden xl:block">-->
<!--                                                <div class="label-default">Uploaded image:</div>-->
<!--                                                <div class="mt-2 flex justify-between fs-12">-->
<!--                                                    <div class="font-semibold">Format:</div>-->
<!--                                                    <div class="text-color-light">PNG</div>-->
<!--                                                </div>-->
<!--                                                <div class="mt-2 flex justify-between fs-12">-->
<!--                                                    <div class="font-semibold">Size:</div>-->
<!--                                                    <div class="text-color-light">11 Kb</div>-->
<!--                                                </div>-->
<!--                                                <div class="mt-2 flex justify-between fs-12">-->
<!--                                                    <div class="font-semibold">Last Updated:</div>-->
<!--                                                    <div class="text-color-light ml-4">Jan 13, 2021</div>-->
<!--                                                </div>-->
<!--                                            </div>-->
                                        </div>
                                        <div class="ml-8 flex flex-no-wrap flex-col justify-end">
                                            <div class="button rounded-lg bg-dark px-8 py-2 font-semibold fs-12 text-white cursor-pointer"
                                                @click="$refs.input_physicality_image.click()">Upload</div>
                                        </div>
                                    </div>

                                    <div class="mt-8 fs-16 ff-minion font-semibold">{{ attributeInEdit.question }}</div>

                                    <div class="mt-6 label-default">Enter description</div>
                                    <div class="mt-2 -mx-10 px-10 editor outline-none custom-scroll overflow-y-scroll character-editor-wrapper" @click="removeTypeHereFromEditor(editor)">
                                        <editor-content class="custom-scroll overflow-y-auto editor__content outline-none" :editor="editor" />
                                    </div>
                                </div>
                                <div v-else-if="attributeInEdit.group === 'traits'">
                                    <div class="fs-16 ff-minion font-semibold">{{ attributeInEdit.question }}</div>

                                    <div class="mt-6 label-default">Select from dropdown</div>
                                    <select class="mt-2 block input-default w-full"
                                        v-model="attributeInEdit.value"
                                        @change="updateCharacterAttribute({ group: attributeInEdit.group, field: attributeInEdit.field, value: $event.target.value })">
                                        <option v-for="option in traitOptions" :value="option">{{ option }}</option>
                                    </select>

                                    <div class="mt-6 label-default">Enter description</div>
                                    <div class="mt-2 -mx-10 px-10 editor outline-none custom-scroll overflow-y-scroll character-editor-wrapper" @click="removeTypeHereFromEditor(editor)">
                                        <editor-content class="custom-scroll overflow-y-auto editor__content outline-none" :editor="editor" />
                                    </div>
                                </div>
                                <div v-else>
                                    <div class="fs-16 ff-minion font-semibold">{{ attributeInEdit.question }}</div>
                                    <div class="mt-6 label-default h-35px">Enter description</div>

    <!--                                <div class="mt-2 outline-none" v-model="attributeInEdit.description" contenteditable="true"-->
    <!--                                     @input="updateCharacterAttribute({ group: attributeInEdit.group, field: attributeInEdit.field, description: $event.target.innerText })">-->
    <!--                                    {{ attributeInEdit.description }}-->
    <!--                                </div>-->

                                    <div class="mt-2 -mx-10 px-10 editor outline-none custom-scroll overflow-y-scroll character-editor-wrapper" @click="removeTypeHereFromEditor(editor)">
                                        <editor-content class="custom-scroll overflow-y-auto editor__content outline-none" :editor="editor" />
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </app-container>
    </app-layout>
</template>

<script>
import { Editor, EditorContent, EditorMenuBar } from 'tiptap';
import {
    Blockquote,
    BulletList,
    CodeBlock,
    HardBreak,
    Heading,
    ListItem,
    OrderedList,
    TodoItem,
    TodoList,
    Bold,
    Code,
    Italic,
    Link,
    Strike,
    Underline,
    History,
} from 'tiptap-extensions';

import Icon from "../../../Components/Icon";
import AppLayout from "../../../Layouts/AppLayout";
import AppContainer from "../../../Layouts/AppContainer";
import Button from "../../../Jetstream/Button";
import JetDialogModal from "../../../Jetstream/DialogModal";
import JetInputError from "../../../Jetstream/InputError";
import Vue from "vue";

export default {
    components: {
        Button,
        AppLayout,
        AppContainer,
        JetDialogModal,
        JetInputError,
        EditorContent,
        EditorMenuBar,
        Icon,
    },

    props: ['book', 'character', 'prop_attributes'],

    data() {
        return {
            attributes: {},
            editor: null,
            attributeInEdit: null,
            traitOptions: [
                'Adventurous',
                'Ambitious',
                'Bossy',
                'Brave',
                'Bright',
                'Cheerful',
                'Cheerful',
                'Considerate',
                'Cooperative',
                'Courageous',
                'Creative',
                'Curious',
                'Daring',
                'Demanding',
                'Dreamer',
                'Energetic',
                'Excited',
                'Fancy',
                'Friendly',
                'Fun loving',
                'Funny',
                'Happy',
                'Hardworking',
                'Helpful',
                'Honest',
                'Humble',
                'Humorous',
                'Impulsive',
                'Independent',
                'Intelligent',
                'Inventive',
                'Keen',
                'Lazy',
                'Leader',
                'Lovable',
                'Loyal',
                'Pitiful',
                'Plain',
                'Proud',
                'Quiet',
                'Reserved',
                'Responsible',
                'Sad',
                'Self-confident',
                'Selfish',
                'Serious',
                'Shy',
                'Simple',
                'Simple-minded',
                'Smart',
                'Studious',
                'Thoughtful',
                'Thrilling',
                'Timid',
                'Unselfish',
                'Witty',
            ],
        }
    },

    mounted() {
        this.attributes = this.prop_attributes;

        console.log('init attr', this.attributes);

        this.getCharacterAttributes();
        this.editor = new Editor({
            extensions: [
                new Blockquote(),
                new BulletList(),
                new CodeBlock(),
                new HardBreak(),
                new Heading({ levels: [1, 2, 3] }),
                new ListItem(),
                new OrderedList(),
                new TodoItem(),
                new TodoList(),
                new Link(),
                new Bold(),
                new Code(),
                new Italic(),
                new Strike(),
                new Underline(),
                new History(),
            ],
            content: `Type here...`,
            onUpdate: ({ getHTML }) => {
                this.updateCharacterAttribute({ group: this.attributeInEdit.group, field: this.attributeInEdit.field, description: getHTML() });
            },
            onBlur: () => {
                if (this.editor.getHTML() === null || this.editor.getHTML() === '' || this.editor.getHTML() === '<p></p>') {
                    this.editor.setContent('Type here..');
                }
            },
        });

        console.log('book mounted', this.book);
        console.log('character mounted', this.character);
        console.log('character attributes mounted', this.attributes);
    },

    methods: {
        getCharacterAttributes() {

        },

        updateCharacterAttribute(data) {
            const url = '/books/'+ this.book.id +'/characters/'+ this.character.id +'/attributes/update';

            const formData = new FormData();
            for (let key in data) {
                formData.append(key, data[key]);
            }

            const options = {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            };

            axios.post(url, formData, options).then((response) => {
                console.log('update character attribute', response.data);
                this.updatePreviews(response.data);
            });
        },

        updatePreviews(data)
        {
            console.log('updatePreviews', data);

            if (data.field === 'image' && data.description === null) {
                console.log('image1', data);
                this.$refs['preview_input_' + data.group + '_' + data.field]
                    .setAttribute('src', this.generateStorageUrl(data.value));

                this.$refs['preview_' + data.group + '_' + data.field]
                    .setAttribute('src', this.generateStorageUrl(data.value));
            }

            if (this.$refs['preview_' + data.field] !== undefined) {
                if (data.description === null) {
                    if (data.field === 'image') {
                        console.log('image1', data);
                        this.$refs['preview_input_' + data.group + '_' + data.field]
                            .setAttribute('src', this.generateStorageUrl(data.value));

                        this.$refs['preview_' + data.group + '_' + data.field]
                            .setAttribute('src', this.generateStorageUrl(data.value));
                    }
                } else {
                    let node = document.createElement('div');
                    node.innerHTML = data.description;
                    let content = node.textContent;

                    console.log(this.$refs['preview_' + data.field]);
                    this.$refs['preview_' + data.field].innerHTML = Vue.filter('truncate')(content, 70);
                }
            }
        },

        selectAttributeInEdit(group, field, question = null) {
            for (let attribute of this.attributes) {
                if (attribute.field === field) {
                    this.attributeInEdit = attribute;
                    this.attributeInEdit.question = question;

                    if (attribute.description !== null) {
                        this.editor.setContent(attribute.description);
                    }
                    return;
                }
            }

            this.attributeInEdit = {
                book_id: this.book.id,
                character_id: this.character.id,
                group: group,
                field: field,
                value: null,
                description: null,
                question: question,
            };

            this.editor.setContent('Type here...');
        },

        getAttributeValue(field, group = null) {
            if (group === null) {
                for (let attribute of this.attributes) {
                    if (attribute.field === field) {
                        console.log(`getAttributeValue, ${field}`, attribute.value);
                        return attribute.value;
                    }
                }
            } else {
                for (let attribute of this.attributes) {
                    if (attribute.group === group && attribute.field === field) {
                        console.log(`getAttributeValue, ${field}`, attribute.value);
                        return attribute.value;
                    }
                }
            }

            console.log(`!return getAttributeValue, ${field}`);
            return undefined;
        },

        truncateString(str, num) {
            if (str.length <= num) {
                return str
            }
            return str.slice(0, num) + '...'
        },

        getAttributeDescription(field) {
            for (let attribute of this.attributes) {
                if (attribute.field === field) {
                    return attribute.description ? attribute.description : null;
                }
            }

            return null;
        },

        formatDate(date) {
            if (date === null) {
                return '';
            }

            const formatDate = new Date(date);
            return formatDate.toLocaleString('default', { month: 'short' }) + ' ' + formatDate.getUTCDate() + ', ' + formatDate.getFullYear();
        },

        getAttributeUpdatedAt(field) {
            for (let attribute of this.attributes) {
                if (attribute.field === field) {
                    return attribute.updated_at ? attribute.updated_at : null;
                }
            }

            return null;
        },

        generateStorageUrl(path) {
            return '/storage/' + path;
        },
    },
}
</script>
