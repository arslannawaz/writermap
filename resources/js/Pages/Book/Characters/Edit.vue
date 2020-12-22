<template>
    <app-layout>
        <app-container width="w-container">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                <div class="">
                    <div class="text-color-light text-sm uppercase">Basics</div>
                    <div class="mt-2 bg-light p-10">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <div>
                                <label class="block label-default">First name</label>
                                <input type="text" :value="getAttributeValue('first_name')" class="input-default input-default_border-none w-full" placeholder="First name"
                                       @change="updateCharacterAttribute({ group: 'basics', field: 'first_name', value: $event.target.value })">
                            </div>

                            <div>
                                <label class="block label-default">Last name</label>
                                <input type="text" :value="getAttributeValue('last_name')" class="input-default input-default_border-none w-full" placeholder="First name"
                                       @change="updateCharacterAttribute({ group: 'basics', field: 'last_name', value: $event.target.value })">
                            </div>
                        </div>

                        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-10">
                            <div>
                                <label class="block label-default">Nickname</label>
                                <input type="text" :value="getAttributeValue('nickname')" class="input-default input-default_border-none w-full" placeholder="Nickname"
                                       @change="updateCharacterAttribute({ group: 'basics', field: 'nickname', value: $event.target.value })">
                            </div>

                            <div>
                                <label class="block label-default">Gender</label>
                                <input type="text" :value="getAttributeValue('gender')" class="input-default input-default_border-none w-full" placeholder="Gender"
                                       @change="updateCharacterAttribute({ group: 'basics', field: 'gender', value: $event.target.value })">
                            </div>
                        </div>

                        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-10">
                            <div>
                                <label class="block label-default">Age</label>
                                <input type="text" :value="getAttributeValue('age')" class="input-default input-default_border-none w-full" placeholder="Age"
                                       @change="updateCharacterAttribute({ group: 'basics', field: 'age', value: $event.target.value })">
                            </div>

                            <div>
                                <label class="block label-default">Naitonality</label>
                                <input type="text" :value="getAttributeValue('nationality')" class="input-default input-default_border-none w-full" placeholder="Naitonality"
                                       @change="updateCharacterAttribute({ group: 'basics', field: 'nationality', value: $event.target.value })">
                            </div>
                        </div>
                    </div>

                    <hr class="mt-10 block w-full border-gray-300">

                    <div class="mt-8 text-color-light text-sm uppercase">Physicality</div>
                    <div class="mt-2 bg-light p-10">
                        <div class="flex justify-between">
<!--                            <div class="image"></div>-->
                            <div>
                                <div class="label-default">Describe your character’s physicality</div>
                                <div class="mt-2">
                                    {{ getAttributeDescription('physicality') | truncate(60, '..') }}
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
                        </div>
                    </div>

                    <hr class="mt-10 block w-full border-gray-300">

                    <div class="mt-8 grid grid-cols-2 gap-10">
                        <div>
                            <div class="text-color-light text-sm uppercase">Traits</div>
                            <div class="mt-2 bg-light p-10">
                                <div class="label-default">Explain character trait</div>
                                <div class="mt-2">
                                    {{ getAttributeDescription('trait_1') | truncate(60, '..') }}
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

                        <div>
                            <div class="text-color-light text-sm uppercase">Traits</div>
                            <div class="mt-2 bg-light p-10">
                                <div class="label-default">Explain character trait</div>
                                <div class="mt-2">
                                    {{ getAttributeDescription('trait_2') | truncate(60, '..') }}
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

                    <div class="mt-8 text-color-light text-sm uppercase">Traits</div>
                    <div class="mt-2 bg-light p-10">

                        <div class="label-default">Explain character trait</div>
                        <div class="mt-2">
                            {{ getAttributeDescription('trait_3') | truncate(60, '..') }}
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

                    <hr class="mt-10 block w-full border-gray-300">

                    <div class="mt-8 grid grid-cols-2 gap-10">
                        <div>
                            <div class="text-color-light text-sm uppercase">Views</div>
                            <div class="mt-2 bg-light p-10">
                                <div class="label-default">Explain character trait</div>
                                <div class="mt-2">
                                    {{ getAttributeDescription('religion') | truncate(60, '..') }}
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

                        <div>
                            <div class="text-color-light text-sm uppercase">Views</div>
                            <div class="mt-2 bg-light p-10">
                                <div class="label-default">Explain character trait</div>
                                <div class="mt-2">
                                    {{ getAttributeDescription('optimistic') | truncate(60, '..') }}
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

                    <hr class="mt-10 block w-full border-gray-300">

                    <div class="mt-8 grid grid-cols-2 gap-10">
                        <div>
                            <div class="text-color-light text-sm uppercase">Background</div>
                            <div class="mt-2 bg-light p-10">
                                <div class="label-default">What social class do they sit in?</div>
                                <div class="mt-2">
                                    {{ getAttributeDescription('background_1') | truncate(60, '..') }}
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
                        </div>

                        <div>
                            <div class="text-color-light text-sm uppercase">Background</div>
                            <div class="mt-2 bg-light p-10">
                                <div class="label-default">What kind of intelligence do they have?</div>
                                <div class="mt-2">
                                    {{ getAttributeDescription('background_2') | truncate(60, '..') }}
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
                    </div>

                    <div class="mt-8 grid grid-cols-2 gap-10">
                        <div>
                            <div class="text-color-light text-sm uppercase">Background</div>
                            <div class="mt-2 bg-light p-10">
                                <div class="label-default">What education does your character have?</div>
                                <div class="mt-2">
                                    {{ getAttributeDescription('background_3') | truncate(60, '..') }}
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

                        <div>
                            <div class="text-color-light text-sm uppercase">Background</div>
                            <div class="mt-2 bg-light p-10">
                                <div class="label-default">What is their hometown and what was it like</div>
                                <div class="mt-2">
                                    {{ getAttributeDescription('background_4') | truncate(60, '..') }}
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
                        </div>
                    </div>

                    <div class="mt-8 grid grid-cols-2 gap-10">
                        <div>
                            <div class="text-color-light text-sm uppercase">Background</div>
                            <div class="mt-2 bg-light p-10">
                                <div class="label-default">What is their occupation?</div>
                                <div class="mt-2">
                                    {{ getAttributeDescription('background_5') | truncate(60, '..') }}
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

                        <div>
                            <div class="text-color-light text-sm uppercase">Background</div>
                            <div class="mt-2 bg-light p-10">
                                <div class="label-default">What are some major turning points?</div>
                                <div class="mt-2">
                                    {{ getAttributeDescription('background_6') | truncate(60, '..') }}
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

                    <hr class="mt-10 block w-full border-gray-300">

                    <div class="mt-8 grid grid-cols-2 gap-10">
                        <div>
                            <div class="text-color-light text-sm uppercase">Relationships</div>
                            <div class="mt-2 bg-light p-10">
                                <div class="label-default">Who is your characters family?</div>
                                <div class="mt-2">
                                    {{ getAttributeDescription('relationship_1') | truncate(60, '..') }}
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

                        <div>
                            <div class="text-color-light text-sm uppercase">Relationships</div>
                            <div class="mt-2 bg-light p-10">
                                <div class="label-default">Who are your characters friends?</div>
                                <div class="mt-2">
                                    {{ getAttributeDescription('relationship_2') | truncate(60, '..') }}
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
                    </div>

                    <div class="mt-8 grid grid-cols-2 gap-10">
                        <div>
                            <div class="text-color-light text-sm uppercase">Relationships</div>
                            <div class="mt-2 bg-light p-10">
                                <div class="label-default">Is your character in a relationship?</div>
                                <div class="mt-2">
                                    {{ getAttributeDescription('relationship_3') | truncate(60, '..') }}
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

                        <div>
                            <div class="text-color-light text-sm uppercase">Relationships</div>
                            <div class="mt-2 bg-light p-10">
                                <div class="label-default">Sexuality, who are they interested in?</div>
                                <div class="mt-2">
                                    {{ getAttributeDescription('relationship_4') | truncate(60, '..') }}
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
                        </div>
                    </div>

                    <hr class="mt-10 block w-full border-gray-300">

                    <div class="mt-8 grid grid-cols-2 gap-10">
                        <div>
                            <div class="text-color-light text-sm uppercase">Struggles</div>
                            <div class="mt-2 bg-light p-10">
                                <div class="label-default">What are your characters insecurities?</div>
                                <div class="mt-2">
                                    {{ getAttributeDescription('struggles_1') | truncate(60, '..') }}
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
                            <div class="text-color-light text-sm uppercase">Struggles</div>
                            <div class="mt-2 bg-light p-10">
                                <div class="label-default">Biggest fear</div>
                                <div class="mt-2">
                                    {{ getAttributeDescription('struggles_2') | truncate(60, '..') }}
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
                </div>

                <div v-if="attributeInEdit !== null">
                    <div class="fixed" style="width: 40.5%">
                        <div></div>
                        <div class="label-default">{{ attributeInEdit.group }}</div>
                        <div class="mt-2 p-4 border border-gray-300">
                            <div class="bg-light p-10" style="height: 1020px">
                                <div class="fs-16 ff-minion font-semibold">{{ attributeInEdit.question }}</div>
                                <div v-if="attributeInEdit.group === 'traits'">
                                    <div class="mt-6 label-default">Select from dropdown</div>
                                    <select class="mt-2 block input-default w-full"
                                        v-model="attributeInEdit.value"
                                        @change="updateCharacterAttribute({ group: attributeInEdit.group, field: attributeInEdit.field, value: $event.target.value })">
                                        <option v-for="option in traitOptions" :value="option">{{ option }}</option>
                                    </select>

                                    <div class="mt-6 label-default">Enter description</div>
                                    <div class="mt-2 editor outline-none">
                                        <editor-content class="editor__content outline-none" :editor="editor" />
                                    </div>
                                </div>
                                <div v-else>
                                    <div class="mt-6 label-default">Enter description</div>

    <!--                                <div class="mt-2 outline-none" v-model="attributeInEdit.description" contenteditable="true"-->
    <!--                                     @input="updateCharacterAttribute({ group: attributeInEdit.group, field: attributeInEdit.field, description: $event.target.innerText })">-->
    <!--                                    {{ attributeInEdit.description }}-->
    <!--                                </div>-->

                                    <div class="mt-2 editor outline-none">
                                        <editor-content class="editor__content outline-none" :editor="editor" />
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

    props: ['book', 'character', 'attributes'],

    data() {
        return {
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
            content: `Example text. Please change it for save.`,
            onUpdate: ({ getHTML }) => {
                this.updateCharacterAttribute({ group: this.attributeInEdit.group, field: this.attributeInEdit.field, description: getHTML() });
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

            axios.post(url, data).then((response) => {
                console.log('update character attribute', response.data);
            });
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

            this.editor.setContent('Example text. Please change it for save.');
        },

        getAttributeValue(field) {
            for (let attribute of this.attributes) {
                if (attribute.field === field) {
                    return attribute.value;
                }
            }
        },

        getAttributeDescription(field) {
            for (let attribute of this.attributes) {
                if (attribute.field === field) {
                    return attribute.description;
                }
            }
        },
    },
}
</script>
