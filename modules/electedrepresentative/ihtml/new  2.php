<tr>
	<td align="center" valign="top"
		style="padding-top: 13px" class="bg_f7f6f2">
		<table width="100%" border="0" cellspacing="0"
			cellpadding="0">
			<tr>
				<td align="left" valign="top" width="59%">
					
					<table width="100%" border="0" cellspacing="0"
						cellpadding="0">
						<tr>
							<td colspan="2" align="left" valign="top">
								<table width="100%" border="0" cellspacing="0"
									cellpadding="0">
									<tr>
										<td align="center" valign="top">
											<table style="width: 100%" border="0"
												cellspacing="0" cellpadding="0">
												<tr>
													<td style="width: 100%" align="left"
														valign="top">
														<table width="100%" border="0"
															cellspacing="0" cellpadding="0">
															<tr>
																<td width="100%" align="left"
																	valign="top">

																	<table width="100%" border="0"
																		cellspacing="0" cellpadding="0">
																		<tr>
																			<td width="100%" height="32"
																				align="left" valign="middle"
																				class="tophead_grad">My Articles</td>
																		</tr>
																		<tr>
																			<td align="left" valign="top"
																				class="votealert_bg">
																				<table width="100%" border="0"
																					cellspacing="0" cellpadding="0">
																					{if $ERContentArticleView} {section
																					name=index
																					loop=$oElectoralDistrictComments}
																					<tr>
																						<td align="left" valign="top">
																							<table width="100%" border="0"
																								cellspacing="0" cellpadding="0">
																								<tr>
																									<td width="47" align="center"
																										valign="top"><img
																										src="images/icon_doc.gif"
																										width="27" height="36" alt=""
																										style="margin-top: 20px" /></td>
																									<td width="367" align="left"
																										valign="top" class="bg_f7f6ee">
																										<table width="100%" border="0"
																											cellspacing="0"
																											cellpadding="0">
																											<tr>
																												<td align="left" valign="top">
																													{$oElectoralDistrictComments[index]->comment|truncate:60}
																													&nbsp;&nbsp; {if
																													$ERContentArticleModifyOwnContent}
																													<a
																													href="index.php?stage=electedrepresentative&mode=EditArticle&articleID={$oElectoralDistrictComments[index]->article_id}"
																													class="arial12Ba60000">
																														<img
																														src="images/icon_edit.png"
																														border="0" alt="Edit"
																														title="Edit" /> </a> {/if} {if
																													$ERContentArticleDelete} <a
																													href="index.php?stage=electedrepresentative&mode=DeleteArticle&articleID={$oElectoralDistrictComments[index]->article_id}"
																													class="arial12Ba60000"
																													onClick="if(!confirm('Are you sure to delete this article?')) return false;">
																														<img
																														src="images/icon_delete.png"
																														border="0" alt="Delete"
																														title="Delete" /> </a> {/if}</td>
																											</tr>
																											<tr>
																												<td height="26" align="right"
																													valign="bottom"><span
																													class="arial12Ba60000"
																													style="float: left">Dated:&nbsp;<span
																														class="arial11Na60000">{$oElectoralDistrictComments[index]->comment_date|date_format:"%Y-%m-%d"}</span>
																												</span> <a
																													href="index.php?stage=electedrepresentative&mode=ArticleDetail&id={$oElectoralDistrictComments[index]->article_id}"
																													class="arial12Ba60000">
																														[read more]</a></td>
																											</tr>
																										</table></td>
																								</tr>
																							</table></td>
																					</tr>
																					<tr>
																						<td align="left" valign="top"
																							class="border_dashed"></td>
																					</tr>
																					{sectionelse}
																					<tr>
																						<td align="left" valign="top"
																							class="border_dashed" width="100%">
																							<table width="100%">
																								<tr>
																									<td valign="top"
																										class="bg_f7f6ee"
																										align="center">No
																										Articles.</td>
																								</tr>
																							</table></td>
																					</tr>
																					{/section}
																					<tr>
																						<td height="40" align="center"
																							valign="middle"><a
																							href="index.php?stage=electedrepresentative&mode=ERArticles"
																							class="arial12BUa60000">view
																								more...</a></td>
																					</tr>

																					{else}
																					<tr>
																						<td valign="top" class="bg_f7f6ee"
																							align="center">Not authorized
																							to view articles.</td>
																					</tr>

																					{/if}
																				</table></td>
																		</tr>
																	</table></td>
															</tr>
														</table></td>
												</tr>
											</table></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr>
							<td align="left" valign="top">&nbsp;</td>
						</tr>
						<tr>
							<td colspan="2" align="left" valign="top">
								<table width="100%" border="0" cellspacing="0"
									cellpadding="0">
									<tr>
										<td align="center" valign="top">
											<table style="width: 100%" border="0"
												cellspacing="0" cellpadding="0">
												<tr>
													<td style="width: 100%" align="left"
														valign="top">
														<table width="100%" border="0"
															cellspacing="0" cellpadding="0">
															<tr>
																<td width="100%" align="left"
																	valign="top">
																	<table width="100%" border="0"
																		cellspacing="0" cellpadding="0">
																		<tr>
																			<td width="100%" height="32"
																				align="left" valign="middle"
																				class="tophead_grad">My Polls</td>
																		</tr>
																		<tr>
																			<td align="left" valign="top"
																				class="votealert_bg">
																				<table width="100%" border="0"
																					cellspacing="0" cellpadding="0">
																					{if $ERContentPollView} {section
																					name=index
																					loop=$oElectoralDistrictPolls}
																					<tr>
																						<td align="left" valign="top">
																							<table width="100%" border="0"
																								cellspacing="0" cellpadding="0">
																								<tr>
																									<td width="47" align="center"
																										valign="top"><img
																										src="images/icon_doc.gif"
																										width="27" height="36" alt=""
																										style="margin-top: 20px" /></td>
																									<td width="367" align="left"
																										valign="top" class="bg_f7f6ee">
																										<table width="100%" border="0"
																											cellspacing="0"
																											cellpadding="0">
																											<tr>
																												<td align="left" valign="top">
																													{$oElectoralDistrictPolls[index]->comment|truncate:60}...
																													&nbsp;&nbsp; {if
																													$ERContentPollDelete} <a
																													href="index.php?stage=electedrepresentative&mode=DeletePoll&pollID={$oElectoralDistrictPolls[index]->article_id}"
																													class="arial12Ba60000"
																													onClick="if(!confirm('Are you sure to delete this poll?')) return false;">
																														<img
																														src="images/icon_delete.png"
																														border="0" alt="Delete"
																														title="Delete" /> </a> {/if}</td>
																											</tr>
																											<tr>
																												<td height="26" align="right"
																													valign="bottom"><span
																													class="arial12Ba60000"
																													style="float: left">Dated:<span
																														class="arial11Na60000">{$oElectoralDistrictPolls[index]->comment_date|date_format:"%Y-%m-%d"}</span>
																												</span> <a
																													href="index.php?stage=electedrepresentative&mode=PollsDetail&id={$oElectoralDistrictPolls[index]->article_id}"
																													class="arial12Ba60000">
																														[read more]</a></td>
																												</td>
																											</tr>
																										</table></td>
																								</tr>
																							</table></td>
																					</tr>
																					<tr>
																						<td align="left" valign="top"
																							class="border_dashed"></td>
																					</tr>
																					{sectionelse}
																					<tr>
																						<td align="left" valign="top"
																							class="border_dashed" width="100%">
																							<table width="100%">
																								<tr>
																									<td valign="top"
																										class="bg_f7f6ee"
																										align="center">No
																										Comments.</td>
																								</tr>
																							</table></td>
																					</tr>
																					{/section}
																					<tr>
																						<td height="40" align="center"
																							valign="middle"><a
																							href="index.php?stage=electedrepresentative&mode=ERPolls"
																							class="arial12BUa60000">view
																								more...</a></td>
																					</tr>
																					{else}

																					<tr>
																						<td align="left" valign="top"
																							class="border_dashed" width="100%">
																							<table width="100%">
																								<tr>
																									<td valign="top"
																										class="bg_f7f6ee"
																										align="center">Not
																										authorized to view polls.</td>
																								</tr>
																							</table></td>
																					</tr>

																					{/if}
																				</table></td>
																		</tr>
																	</table></td>
															</tr>
														</table></td>
												</tr>
											</table></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					
				</td>
				
				<td align="left" valign="top" width="2%"><img
					src="images/trans.gif" height="1" width="10px" />
				</td>
				
				<td align="left" valign="top" width="39%">
					<table width="100%" border="0" cellspacing="0"
						cellpadding="0">
						<tr>
							<td align="center" valign="top">
								<table style="width: 100%" border="0"
									cellspacing="0" cellpadding="0">
									<tr>
										<td style="width: 100%" align="left"
											valign="top">
											<table width="100%" border="0" cellspacing="0"
												cellpadding="0">
												<tr>
													<td width="100%" align="left" valign="top">
														<table width="100%" border="0"
															cellspacing="0" cellpadding="0">
															<tr>
																<td width="100%" height="32" align="left"
																	valign="middle" class="tophead_grad">Report
																	Card</td>
															</tr>
															<tr>
																<td align="left" valign="top"
																	class="votealert_bg">
																	<table width="100%" border="0"
																		cellspacing="0" cellpadding="0">
																		{if $ERContentReportCardView} {section
																		name=index loop=$affiliateVoteAlerts}
																		<tr>
																			<td align="left" valign="top">
																				<table width="100%" border="0"
																					cellspacing="0" cellpadding="0">
																					<tr>
																						<td width="100%" align="left"
																							valign="top" class="bg_f7f6ee">
																							<table width="100%" border="0"
																								cellspacing="0" cellpadding="0">
																								<tr>
																									<td align="left" valign="top">
																										<a
																										href="index.php?stage=billresources&mode=billCompleteDetails&billNo={$affiliateVoteAlerts[index].bill_number}"
																										class="arialB13000000"
																										style="font-weight: normal;">
																											{$affiliateVoteAlerts[index].article_title}
																									</a></td>
																								</tr>
																								<tr>
																									<td height="26" align="left"
																										valign="bottom"><span
																										class="arial12B000000">Support:</span>&nbsp;<span
																										class="arial12N000000">{$affiliateVoteAlerts[index].supportPercentage}%</span>
																										&nbsp;&nbsp;<span
																										class="arial12B000000">Oppose:</span>&nbsp;<span
																										class="arial12N000000">{$affiliateVoteAlerts[index].opposePercentage}%</span>
																									</td>
																								</tr>
																							</table></td>
																					</tr>
																				</table></td>
																		</tr>
																		<tr>
																			<td align="left" valign="top"
																				class="border_dashed"></td>
																		</tr>
																		{sectionelse}
																		<tr>
																			<td align="left" valign="top"
																				class="border_dashed" width="100%">
																				<table width="100%">
																					<tr>
																						<td valign="top" class="bg_f7f6ee"
																							align="center">No Record
																							Found.</td>
																					</tr>
																				</table></td>
																		</tr>
																		{/section}
																		<tr>
																			<td height="40" align="center"
																				valign="middle"><a
																				href="index.php?stage=electedrepresentative&mode=ERReportCard"
																				class="arial12BUa60000">view
																					more...</a></td>
																		</tr>
																		{else}
																		<tr>
																			<td valign="top" class="bg_f7f6ee"
																				align="center">Not authorized to
																				view report card.</td>
																		</tr>

																		{/if}
																	</table></td>
															</tr>
														</table></td>
												</tr>
											</table></td>
									</tr>
								</table></td>
						</tr>
						
						<tr>
							<td align="left" valign="top">&nbsp;</td>
						</tr>
						
						<tr>
							<td align="center" valign="top">
								<table style="width: 100%" border="0"
									cellspacing="0" cellpadding="0">
									<tr>
										<td style="width: 100%" align="left"
											valign="top">
											<table width="100%" border="0" cellspacing="0"
												cellpadding="0">
												<tr>
													<td width="100%" align="left" valign="top">
														<table width="100%" border="0"
															cellspacing="0" cellpadding="0">
															<tr>
																<td width="100%" height="32" align="left"
																	valign="middle" class="tophead_grad">Report
																	Card</td>
															</tr>
															<tr>
																<td align="left" valign="top"
																	class="votealert_bg">
																	<table width="100%" border="0"
																		cellspacing="0" cellpadding="0">
																		{if $ERContentReportCardView} {section
																		name=index loop=$affiliateVoteAlerts}
																		<tr>
																			<td align="left" valign="top">
																				<table width="100%" border="0"
																					cellspacing="0" cellpadding="0">
																					<tr>
																						<td width="100%" align="left"
																							valign="top" class="bg_f7f6ee">
																							<table width="100%" border="0"
																								cellspacing="0" cellpadding="0">
																								<tr>
																									<td align="left" valign="top">
																										<a
																										href="index.php?stage=billresources&mode=billCompleteDetails&billNo={$affiliateVoteAlerts[index].bill_number}"
																										class="arialB13000000"
																										style="font-weight: normal;">
																											{$affiliateVoteAlerts[index].article_title}
																									</a></td>
																								</tr>
																								<tr>
																									<td height="26" align="left"
																										valign="bottom"><span
																										class="arial12B000000">Support:</span>&nbsp;<span
																										class="arial12N000000">{$affiliateVoteAlerts[index].supportPercentage}%</span>
																										&nbsp;&nbsp;<span
																										class="arial12B000000">Oppose:</span>&nbsp;<span
																										class="arial12N000000">{$affiliateVoteAlerts[index].opposePercentage}%</span>
																									</td>
																								</tr>
																							</table></td>
																					</tr>
																				</table></td>
																		</tr>
																		<tr>
																			<td align="left" valign="top"
																				class="border_dashed"></td>
																		</tr>
																		{sectionelse}
																		<tr>
																			<td align="left" valign="top"
																				class="border_dashed" width="100%">
																				<table width="100%">
																					<tr>
																						<td valign="top" class="bg_f7f6ee"
																							align="center">No Record
																							Found.</td>
																					</tr>
																				</table></td>
																		</tr>
																		{/section}
																		<tr>
																			<td height="40" align="center"
																				valign="middle"><a
																				href="index.php?stage=electedrepresentative&mode=ERReportCard"
																				class="arial12BUa60000">view
																					more...</a></td>
																		</tr>
																		{else}
																		<tr>
																			<td valign="top" class="bg_f7f6ee"
																				align="center">Not authorized to
																				view report card.</td>
																		</tr>

																		{/if}
																	</table></td>
															</tr>
														</table></td>
												</tr>
											</table></td>
									</tr>
								</table></td>
						</tr>
						
						
					</table></td>
			</tr>
			<tr>
				<td align="left" valign="top" colspan="3">&nbsp;</td>
			</tr>
		</table>
	</td>
	</tr>